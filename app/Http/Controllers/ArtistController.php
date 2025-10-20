<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $artists = Artist::all();
    return view('artists.index', compact('artists'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'debut_year' => 'required|integer|min:1900|max:' . date('Y'),
        'social_media_handle' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
    ]);

    // If a profile picture was uploaded, store it in public/images/artists
    if ($request->hasFile('profile_picture')) {
        $imageName = time() . '.' .$request->profile_picture->extension();
        $request->profile_picture->move(public_path('images/artists'), $imageName);
        $validatedData['profile_picture'] = $imageName;
    }

    Artist::create([
        'name' => $request->name,
        'genre' => $request->genre,
        'debut_year' => $request->debut_year,
        'social_media_handle' => $request->social_media_handle,
        'description' => $request->description,
        'profile_picture' => $imageName,
    ]);

    // Redirect back to the artist index (list) page with a success message
    return to_route('artists.index')->with('success', 'Artist created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the artist by ID or fail if it doesn’t exist
        $artist = \App\Models\Artist::findOrFail($id);

        // Return the edit view with the artist data
        return view('artists.edit', compact('artist'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
