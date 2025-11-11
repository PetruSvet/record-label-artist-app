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
        'release_date' => 'nullable|date',
        'record_label' => 'nullable|string|max:255',
        'record_label_custom' => 'nullable|string|max:255',
    ]);

    // Use custom label if provided
    if (!empty($validated['record_label_custom'])) {
        $validated['record_label'] = $validated['record_label_custom'];
    }

    Song::create([
        'title' => $validated['title'],
        'artist_id' => $validated['artist_id'],
        'release_date' => $validated['release_date'],
        'record_label' => $validated['record_label'],
    ]);

     return redirect()->back()->with('success', 'Song added successfully!');
}

    public function destroy(Song $song)
    {
        $song->delete();  // delete the song from database
        return redirect()->back()->with('success', 'Song deleted successfully.');
    }

}
