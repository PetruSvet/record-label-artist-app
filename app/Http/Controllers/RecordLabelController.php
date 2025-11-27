<?php

namespace App\Http\Controllers;

use App\Models\Recordlabel;
use Illuminate\Http\Request;

class RecordlabelController extends Controller
{
    public function index()
    {
        $recordlabels = Recordlabel::all();
        return view('recordlabels.index', compact('recordlabels'));
    }

    // Show form to create new record label
    public function create()
    {
        return view('recordlabels.create');
    }

    // Store new record label in database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'founded' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
        ]);

        Recordlabel::create($validated);

        return redirect()
            ->route('recordlabels.index')
            ->with('success', 'Record label added!');
    }

    public function edit(Recordlabel $recordlabel)
    {
        return view('recordlabels.edit', compact('recordlabel'));
    }

    public function update(Request $request, Recordlabel $recordlabel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'founded' => 'nullable|string|max:255',
            'headquarters' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
        ]);

        $recordlabel->update($validated);

        return redirect()
            ->route('recordlabels.index')
            ->with('success', 'Record label updated!');
    }

    public function destroy(Recordlabel $recordlabel)
    {
        $recordlabel->delete();

        return redirect()
            ->route('recordlabels.index')
            ->with('success', 'Record label deleted!');
    }
}
