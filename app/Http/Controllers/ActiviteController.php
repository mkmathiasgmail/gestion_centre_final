<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{

    public function index(){
        $rep= Activite::all();
    
       return view('activites.index',compact('rep'));
    }

    public function create()
    {

        $cat = Categorie::all();
        return view("components.form",compact("cat"));
    }

    public function store(Request $request)
    {
        $activites = Activite::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'lieu' => 'kinshasa',
            'status' => 1,
            'date_debut' => $request->date_debut,
            'categorie_id' => $request->categorie_id,
            'date_fin' => $request->date_fin
        ]);

        return redirect()->route('activites.index', compact('activites'));
    }


    public function show(Activite $activite)
    {
        $show= $activite;
        $candidats = Candidat::has('activite')->get();
        return view('activites.show', compact('show', 'candidats'));
    }


    public function edit(Activite $activite)
    {
        //
    }


    public function update(Request $request, Activite $activite)
    {
        $activite->update($request->all());
        return redirect()->route('activites.index')
                        ->with('success', 'Activite updated successfully.');
    }

    public function destroy(Activite $activite)
    {
        $activite->delete();
        return redirect()->route('activites.index')
                        ->with('success', 'Activite deleted successfully.');
    }

    Public function encours(){
        $today= Carbon::today();
        $activites= Activite::where('date_debut','<=',$today)->where('date_fin','>=',$today)->get();
        return view('encours',compact('activites'));
    }
}
