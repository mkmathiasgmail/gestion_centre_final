<?php

namespace App\Http\Controllers;

use App\Models\Employabilite;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreEmployabiliteRequest;
use App\Http\Requests\UpdateEmployabiliteRequest;
use App\Models\Odcuser;

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
        $email = $request->email;
        $employabilite = Odcuser::select(["id" , "email", "firstname"])->where("email", $email)->first();
        if(!empty($employabilite)){
            $name = $employabilite->firstname;
            $id = $employabilite->id;
            $employabilites = Employabilite::create([
                'name' =>$name,
                'type_contrat' => $request->type_contrat,
                'nomboite' => $request->nomboite,
                'periode' => $request->periode,
                'odcuser_id' => $id,
            ]);
            return redirect()->route('employabilites.index')->with('success', 'Employé ajoutée avec succès');
        }
        else{
            return back()->with('error', 'Utilisateur non trouvé');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employabilite $employabilite)
    {
        $employabilites = Employabilite::find($employabilite->id);
        return view('employabilites.show')->with('employabilites', $employabilites);
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
