<?php

namespace App\Http\Controllers;

use App\Models\Song;       // import the Song model
use App\Models\Artist;    // import artist model
use Illuminate\Http\Request;

class SongController extends Controller
{
public function store(Request $request)
{
$validated = $request->validate([
    'title' => 'required|string|max:255',
    'release_date' => 'nullable|date',
    'artist_id' => 'required|exists:artists,id',
    'recordlabel_id' => 'nullable|exists:recordlabels,id',
]);

Song::create($validated);

return back()->with('success', 'Song added successfully!');

}

public function destroy(Song $song)
{
    $song->delete(); // deletes the song
    return back()->with('success', 'Song deleted successfully!');
}
}
