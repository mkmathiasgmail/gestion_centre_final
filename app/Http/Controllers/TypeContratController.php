<?php

namespace App\Http\Controllers;

use App\Models\TypeContrat;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TypeContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeContrats = TypeContrat::all();
        return view('typeContrat.index', compact('typeContrats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('type_Contrats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'libelle' => 'required|string|max:255',
        ]);
        try {
            $typeContrat = TypeContrat::create([
                'libelle' => $request->libelle,
            ]);
            $typeContrat->save();


            return redirect()->route('type_Contrats.index')->with('success', 'Type de contrat ajouté avec succès');
        } catch (\Throwable $th) {
            return redirect()->route('type_Contrats.index')->with('error', 'Erreur lors de l\'ajout du type de contrat');
        }
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
    public function edit(string $id)
    {
        $typeContrat = TypeContrat::find($id);
        return view('typeContrat.edit', compact('typeContrat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $typeContrat = TypeContrat::find($id);
        $typeContrat->libelle = $request->libelle;
        $typeContrat->save();
        return redirect()->route('type_Contrats.index')->with('success', 'Type de contrat modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeContrat = TypeContrat::find($id);
        $typeContrat->delete();
        return redirect()->route('type_Contrats.index')->with('success', 'Type de contrat supprimé avec succès');
    }
}