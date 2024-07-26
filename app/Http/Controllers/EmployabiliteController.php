<?php

namespace App\Http\Controllers;




use DateTime;
use App\Models\Odcuser;
use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Employabilite;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEmployabiliteRequest;
use App\Http\Requests\UpdateEmployabiliteRequest;
use App\Models\TypeContrat;

class EmployabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $names = Employabilite::select('name')
            ->groupBy('name')
            ->pluck('name')
            ->toArray();

        $employabilites = collect([]);
        foreach ($names as $name) {
            $employabilite = Employabilite::whereRaw(
                "
            id = (
                SELECT id
                FROM (
                    SELECT id
                    FROM employabilites
                    WHERE name = ?
                    ORDER BY id DESC
                    LIMIT 1
                ) AS subquery
            )",
                [$name]
            )->get();

            $employabilites = $employabilites->merge($employabilite);
        }
        $typeContrats = TypeContrat::all();

        return view('employabilites.index', compact('employabilites', 'typeContrats'));
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

        $request->validate([

            'first_name' => 'required|string',
            'type_contrat' => 'required|string',
            'periode' => 'required|date',
            'nomboite' => 'required|string',
            'poste' => 'required|string',
        ]);
        $name = $request->input('first_name');
        $names = explode(' ', $name);

        $firstName = $names[0];
        $lastName = '';

        // Vérifiez si le tableau $names contient au moins trois éléments
        if (count($names) >= 3) {

            // Si le tableau contient quatre éléments ou plus, combinez les troisième et quatrième éléments
            if (isset($names[3])) {
                $lastName = $names[2] . ' ' . $names[3];
            } else {
                $lastName = $names[2];
            }
        }

        // Récupérer les activités liées au candidat
        $activites = DB::table("activites")
            ->join('categories as ca', 'ca.id', '=', 'activites.categorie_id')
            ->join('candidats as cnd', 'cnd.activite_id', '=', 'activites.id')
            ->join('odcusers as od', 'od.id', '=', 'cnd.odcuser_id')
            ->select('activites.title', 'ca.name', 'activites.start_date', 'activites.end_date')
            ->where('od.first_name', '=', $firstName)
            ->where('od.last_name', '=', $lastName)
            ->orderBy('end_date', 'desc')
            ->get();


        // Vérifications des dates
        $dateEmployabilite = $request->periode;

        $dernierActivite = Activite::first();
        // Recherche de la dernière activité
        $dateFinDerniereActivite = $dernierActivite->end_date;

        try {

            $dateEmployabilite = new DateTime($request->periode);
            $dateFinDerniereActivite = new DateTime($dateFinDerniereActivite);
            $dateAujourdhui = new DateTime();

            // Vérifier si la date d'employabilité est supérieure à la dernière activité
            if ($dateEmployabilite > $dateFinDerniereActivite) {

                if ($dateEmployabilite <= $dateAujourdhui) {

                    Employabilite::create([
                        'name' => $request->first_name,
                        'type_contrat' => $request->type_contrat,
                        'nomboite' => $request->nomboite,
                        'poste' => $request->poste,
                        'periode' => $request->periode,
                        'derniere_activite' => $activites->first()->title,
                        'derniere_service' => $activites->first()->name,
                        'date_participation' => $activites->first()->start_date,
                        'odcuser_id' => $request->id_user,
                        'type_contrat_id' => $request->type_contrat,
                    ]);
                    return redirect()->route('employabilites.index')->with('success', 'Employé ajouté avec succès');
                } else {
                    return back()->with('error', 'La date d\'employabilité ne doit pas être supérieure à la date du jour');
                }
            } else {
                return back()->with('error', 'La date d\'employabilité doit être supérieure à la dernière activité');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Erreur lors de l\'ajout de l\'employabilité parce que l\'utilisateur n\'a pas d\'activités');
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