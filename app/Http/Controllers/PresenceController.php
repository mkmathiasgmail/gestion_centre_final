<?php

namespace App\Http\Controllers;



use auth;
use Carbon\Carbon;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdatePresenceRequest;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presence = Presence::orderBy('id')->get();
        return view('presences.presence', compact('presence'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presences.selection');
    }
    public function filtrer(Request $request)
    {
        $request->validate([
            'email' => 'required|max:50|min:6',
        ]);
        $email = $request->input('email');
        $filtre = Odcuser::where('email', $email)->first();
        if ($filtre) {
            $candidat = $filtre->candidat()->where('status', 1)->first();
            if ($candidat) {
                
                return view('presences.confirInfo', ['prenom' => $filtre->first_name, 'nom' => $filtre->last_name]);
            } else {
                return back()->with('error', 'Compte innactif!');
            }
        } else {
            return back()->with('error', 'Utilisateur n\'existe pas!');
        }
    }
    public function store(Request $request)
    {
        // Valider les données entrantes

        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);

        $prenom = $validatedData['first_name'];
        $nom = $validatedData['last_name'];

        // Rechercher l'ID du candidat correspondant
        $candidatId = DB::table('candidats')
            ->join('odcusers', 'candidats.odcuser_id', '=', 'odcusers.id')
            ->join('activites', 'candidats.activite_id', '=', 'activites.id')
            ->where('odcusers.first_name', $prenom)
            ->where('odcusers.last_name', $nom)
            ->whereRaw('CURRENT_DATE() BETWEEN activites.date_debut AND activites.date_fin')
            ->select('candidats.id')
            ->first();
        if ($candidatId) {
            $presence = new Presence;
            $presence->candidat_id = $candidatId->id;
            $presence->date = now();
            $presence->save();
            return redirect()->route('presences.index')->with('success', 'Présence enregistrée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Aucun candidat trouvé pour cet utilisateur.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Presence $presence)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresenceRequest $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        //
    }
    public function encours()
    {
        $today = Carbon::today();
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
        return view('presences.activiteEncours', compact('activites'));
    }
   
       
}
 




