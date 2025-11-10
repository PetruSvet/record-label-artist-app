<?php

namespace App\Http\Controllers;

use App\Models\Song;       // import the Song model
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
        ]);

        Song::create($validated);

        return back()->with('success', 'Song added successfully!');
    }

    public function update(Request $request, Song $song)
    {
        $song->update($request->validate(['title' => 'required|string|max:255']));
        return back()->with('success', 'Song updated successfully!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return back()->with('success', 'Song deleted successfully!');
    }
}
