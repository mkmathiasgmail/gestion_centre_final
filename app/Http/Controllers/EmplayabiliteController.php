<?php

namespace App\Http\Controllers;

use App\Models\Emplayabilite;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreEmplayabiliteRequest;
use App\Http\Requests\UpdateEmplayabiliteRequest;

class EmplayabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
            $employabilites = Emplayabilite::all();
        return view('employabilite.index', compact('employabilites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employabilite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmplayabiliteRequest $request)
    {
        $activites = Emplayabilite::create([
            'name' => $request->name,
            'type_contrat' => $request->type_contrat,
            'genre_contrat' => $request->genre_contrat,
            'nomboite' => $request->nomboite,
            'periode' => $request->periode,


        ]);


        return redirect()->route('employabilite.index', compact('employabilites'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Emplayabilite $emplayabilite)
    {
        $emplayabilites = Emplayabilite::all();
        return view('employabilite.show', compact('emplayabilites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplayabilite $emplayabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmplayabiliteRequest $request, Emplayabilite $emplayabilite)
    {
       $emplayabilite->update($request->all());
       return redirect()->route('employabilite.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplayabilite $emplayabilite)
    {
        //
    }
}
