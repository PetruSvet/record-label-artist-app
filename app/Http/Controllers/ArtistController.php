<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));   // Show all artists
    }

    
    function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('books.index')->width('error', 'Access Denied.');
        }
        return view('artists.create');        // Show form to create new artist
    }

    
    public function store(Request $request)            // Save new artist
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'debut_year' => 'required|integer|min:1900|max:' . date('Y'),
            'social_media_handle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'embed' => 'nullable|url',
        ]);

        // profile picture upload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' .$request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/artists'), $imageName);
            $validatedData['profile_picture'] = $imageName;
        }

        // Save artist
        Artist::create([
            'name' => $request->name,
            'genre' => $request->genre,
            'debut_year' => $request->debut_year,
            'social_media_handle' => $request->social_media_handle,
            'description' => $request->description,
            'profile_picture' => $imageName ?? null,
            'embed' => $request->embed,
        ]);

        return to_route('artists.index')->with('success', 'Artist created successfully!');
    }

    // Show single artist details
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    // Show form to edit an artist
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    // Update artist
    public function update(Request $request, Artist $artist)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'debut_year' => 'required|integer|min:1900|max:' . date('Y'),
            'social_media_handle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'embed' => 'required|string'
        ]);

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
