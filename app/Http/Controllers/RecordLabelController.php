<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recordLabels = Recordlabel::all();
        return view('recordlabels.index', compact('recordLabels'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recordlabel $recordlabel)
    {
        return view('recordlabels.edit', compact('recordlabel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recordlabel $recordlabel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $recordlabel->update($validated);
        return redirect()->route('recordlabels.index')->with('success', 'Record label updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recordlabel $recordlabel)
    {
        $recordlabel->delete();
        return redirect()->route('recordlabels.index')->with('success', 'Record label deleted!');
    }
}
