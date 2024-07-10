<?php

namespace App\Http\Controllers;




use Carbon\Carbon;
use App\Models\Odcuser;
use App\Models\Activite;
use Illuminate\Http\Request;

use App\Models\Employabilite;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Database\Seeders\OdcuserSeeder;
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


        $name = $request->input('first_name');
        $names = explode(' ', $name);

        $firstName = $names[0];

        if (isset($names[3])){
            $lastName = $names[2] +' '+ $names[3];
        }
        $lastName = $names[2];






        $activites = DB::table("activites")
        ->join('categories as ca' , 'ca.id' , '=' , 'activites.categorie_id')
        ->join('candidats as cnd' , 'cnd.activite_id' , '=' , 'activites.id')
        ->join('odcusers as od' , 'od.id' , '=' , 'cnd.odcuser_id')
        ->select('activites.title', 'ca.name', 'activites.start_date','activites.end_date')
        ->where('od.first_name', '=', $firstName)
        ->where('od.last_name', '=', $lastName)
        ->orderBy('end_date', 'desc')
        ->get();
        // Vérifications des dates
        $dateEmployabilite =($request->periode);

        $dernierActivite = Activite::first();
        // Recherche de la dernière activité
        $dateFinDerniereActivite = $dernierActivite->end_date;


        $dateEmployabilite =  $request->periode;
        //comparaison  de superiorités entre deux
        if ($dateEmployabilite>$dateFinDerniereActivite) {
            // Création de l'employabilité
            Employabilite::create([
                'name' =>$request->first_name,
                'type_contrat' => $request->type_contrat,
                'nomboite' => $request->nomboite,
                'poste' => $request->poste,
                'periode' => $request->periode,
                'derniere_activite'=> $activites->first()->title,
                'derniere_service'=> $activites->first()->name,
                'date_participation'=> $activites->first()->start_date,
                'odcuser_id' =>$request->id_user,

            ]);
            return redirect()->route('employabilites.index')->with('success', 'Employé ajoutée avec succès');

        } else {

        return back()->with('error', 'La date d\'employabilité doit être supérieure à la dernière activité');

      }


    }

    /**
     * Display the specified resource.
     */
    public function show(Employabilite $employabilite)
    {

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
