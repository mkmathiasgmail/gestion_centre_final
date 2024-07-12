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
    public function create($id)
    {
        return view('presences.selection', compact('id'));
    }
    public function filtrer(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|max:50|min:6',
        ]);
        $email = $request->input('email');
        $filtre = Odcuser::where('email', $email)->first();
        
        if (isset($filtre)) {
            $candidat = $filtre->candidat()->where('status', 'new')->where('activite_id', $id)->first();
            if (isset($candidat)) {
                $activiteCandidat = $candidat->where('activite_id', $id);

                
                return view('presences.confirInfo', ['prenom' => $filtre->first_name, 'nom' => $filtre->last_name]);
            } else {
                return back()->with('errorinactif', 'Compte innactif!');
            }
        } else {
            return back()->with('error', 'Utilisateur n\'existe pas!');
        }
    }
    public function store(Request $request)
    {
        // Valider les données entrantes
       

        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        
        $prenom = $validatedData['firstname'];
        $nom = $validatedData['lastname'];


      

        // Rechercher l'ID du candidat correspondant
        $candidatId = DB::table('candidats')
        ->join('odcusers', 'candidats.odcuser_id', '=', 'odcusers.id')
        ->join('activites', 'candidats.activite_id', '=', 'activites.id')
        ->where('odcusers.first_name', $prenom)
        ->where('odcusers.last_name', $nom)
        ->select('candidats.id','activite_id')
        ->first();     

        if ($candidatId->id) {
            $presence = new Presence;
            $presence->candidat_id = $candidatId->id;
            $presence->date = now();
            $presence->save();
            return view('presences.confirmation');
        } else {
            return redirect()->back()->with('error', 'Aucun candidat trouvé pour cet utilisateur.');
        }
    }

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
 

