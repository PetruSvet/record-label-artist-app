<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Recordlabel;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // Show all artists
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    // Show create form
   public function create()
{
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('books.index')->with('error', 'Access Denied.');
    }

    $labels = Recordlabel::all(); 

    return view('artists.create', compact('labels'));
}


    // Store new artist
    public function store(Request $request)
    {
        // Save artist
$artist = Artist::create([
    'name' => $request->name,
    'genre' => $request->genre,
    'debut_year' => $request->debut_year,
    'social_media_handle' => $request->social_media_handle,
    'description' => $request->description,
    'profile_picture' => $imageName ?? null,
    'embed' => $request->embed,
]);

// Sync record labels (many-to-many)
$artist->recordlabels()->sync($request->recordlabels ?? []);

return to_route('artists.index')->with('success', 'Artist created successfully!');


        // profile picture upload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/artists'), $imageName);
            $validatedData['profile_picture'] = $imageName;
        }

        Artist::create($validatedData);

        return to_route('artists.index')->with('success', 'Artist created successfully!');
    }

    // Show single artist + songs
public function show(Artist $artist)
{
    $songs = $artist->songs;
    return view('artists.show', compact('artist', 'songs'));
}


    // Show edit form
    public function edit(Artist $artist)
    {
        $labels = Recordlabel::all();
        return view('artists.edit', compact('artist', 'labels'));
    }

    // Update artist
    public function update(Request $request, Artist $artist)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'debut_year' => 'required|integer|min:1900|max:' . date('Y'),
            'social_media_handle' => 'nullable|string|max:255',
            'description' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'embed' => 'nullable|url',
            'recordlabel_id' => 'nullable|exists:recordlabels,id',
        ]);

        // Update artist fields
$artist->update($validatedData);

// Sync record labels
$artist->recordlabels()->sync($request->recordlabels ?? []);

return to_route('artists.index')->with('success', 'Artist updated successfully!');


        // profile picture upload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->move(public_path('images/artists'), $imageName);
            $validatedData['profile_picture'] = $imageName;
        }

        $artist->update($validatedData);

        return to_route('artists.index')->with('success', 'Artist updated successfully!');
    }

    // Delete artist
    public function destroy(Artist $artist)
    {
        if ($artist->profile_picture && file_exists(public_path('images/artists/' . $artist->profile_picture))) {
            unlink(public_path('images/artists/' . $artist->profile_picture));
        }

        $artist->delete();

        return to_route('artists.index')->with('success', 'Artist deleted successfully!');
    }
}
