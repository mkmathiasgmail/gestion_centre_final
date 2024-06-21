<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Http\Requests\StoreHashtagRequest;
use App\Http\Requests\UpdateHashtagRequest;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hashtags = Hashtag::all();
        return view('hashtags.index', compact('hashtags')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHashtagRequest $request)
    {
        $hashtag = Hashtag::create([
            'code' => $request->code,
            'hashtag' => $request->hashtag,
        ]);

        return redirect()->route('hashtags.index')
            ->with('success', 'Hashtag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hashtag $hashtag)
    {
        return view('hashtags.show', compact('hashtag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hashtag $hashtag)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHashtagRequest $request, Hashtag $hashtag)
    {
        $hashtag->update([
            'code' => $request->code,
            'hashtag' => $request->hashtag,
        ]);

        return redirect()->route('hashtags.index')
            ->with('success', 'Hashtag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hashtag $hashtag)
    {
        $hashtag->delete();

        return redirect()->route('hashtags.index')
            ->with('success', 'Hashtag deleted successfully.');
    }
}
