<?php

namespace App\Http\Controllers;

use App\Models\Employabilite;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreEmployabiliteRequest;
use App\Http\Requests\UpdateEmployabiliteRequest;

class EmployabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
            $employabilites = Employabilite::all();
        return view('employabilites.index', compact('employabilites'));
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
    public function store(StoreEmployabiliteRequest $request)
    {
        $employabilite = Employabilite::select(["id" , "email"  ]);

        $employabilites = Employabilite::create([
            'name' => $request->name,
            'type_contrat' => $request->type_contrat,
            'genre_contrat' => $request->genre_contrat,
            'nomboite' => $request->nomboite,
            'periode' => $request->periode,


        ]);


        return redirect()->route('employabilites.index', compact('employabilites'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employabilite $employabilite)
    {
        $employabilites = Employabilite::all();
        return view('employabilites.show', compact('employabilites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employabilite $employabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployabiliteRequest $request, Employabilite $employabilite)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employabilite $employabilite)
    {
        //
    }
}
