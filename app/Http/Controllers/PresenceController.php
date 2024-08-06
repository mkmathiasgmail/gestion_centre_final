<?php

namespace App\Http\Controllers;



use auth;
use Carbon\Carbon;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Presence;
use App\Models\Userlocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presences = Presence::orderBy('id')->get();

        return view('presences.presence', compact('presences'));
    }
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
            $candidat = $filtre->candidat()->where('status', 'accept')->where('activite_id', $id)->first();

            $activiteCandidat = $candidat->where('activite_id', $id);

            if (isset($activiteCandidat)) {

                return view('presences.confirInfo', ['prenom' => $filtre->first_name, 'nom' => $filtre->last_name], compact('id')) ;
            } else {
                return back()->with('errorinactif', 'Compte innactif!');
            }
        } else {
            return back()->with('error', 'Utilisateur n\'existe pas!');
        }
    }
    public function store(Request $request, $id)
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
            ->where('activites.id',$id)
            ->select('candidats.id')
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


    public function encours()
    {
        $today = Carbon::today();
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
        return view('presences.activiteEncours', compact('activites'));
    }


    public function userlocal(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            
        ]);
        $userlocal = new Odcuser;
        $userlocal->first_name = $validated['first_name'];
        $userlocal->last_name = $validated['last_name'];
        $userlocal->email = $validated['email'];
        $userlocal->password = $validated['password'];
        return back();
    }
    
}
