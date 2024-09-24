<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
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
    public function store(StoreCategorieRequest $request)
    {
        Categorie::create([
            'categorie' => $request->categorie,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'La catégorie a été créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update([
            'categorie' => $request->categorie,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'La catégorie a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }


    public function showActivites($id)
    {
        // Récupérer la catégorie avec ses activités
        $categorie = Categorie::with('activites')->findOrFail($id);
        return view('categories.activites', compact('categorie'));
    }
}
