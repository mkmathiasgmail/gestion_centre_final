<?php

namespace App\Http\Controllers;



use auth;
use Carbon\Carbon;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
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
        $activite=Activite::find($id);
        return view('presences.selection', compact('id','activite'));
    }
    public function filtrer(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|max:50|min:6',
        ]);

        $email = $request->input('email');
        $filtre = Odcuser::where('email', $email)->first();
        $activite=Activite::find($id);

        if ($filtre) {
            $candidat = $filtre->candidat()->where('status', 'accept')->where('activite_id', $id)->first();
            if ($candidat) {
                $activiteCandidat = $candidat->where('activite_id', $id);

                if ($activiteCandidat) {
                    return view('presences.confirInfo', [
                        'prenom' => $filtre->first_name,
                        'nom' => $filtre->last_name,
                        'id' => $id,
                    ], compact('activite') );
                } else {
                    return back()->with('errorinactif', 'vous n\'êtes de cette activité!');
                }
            } else {
                return back()->with('error', 'Vous n\'êtes pas un participant de cette activite!');
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
            ->where('activites.id', $id)
            ->select('candidats.id')
            ->first();

        if ($candidatId) {
            $date = now()->format('Y-m-d'); 
            $presenceExists = Presence::where('candidat_id', $candidatId->id)->where('activite_id', $id)
                ->whereDate('date', $date)
                ->exists();

            if (!$presenceExists) {
                $presence = new Presence;
                $presence->candidat_id = $candidatId->id;
                $presence->date = now();
                $presence->save();
                return view('presences.confirmation');
            } else {
                return redirect()->route('activitencours')->with('error', 'La presence de ce candidat pour ce jour existe déjà');
            }
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
    public function local(){
        $today = Carbon::today();
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();

        return view('presences.userlocal', compact('activites'));
    }
    public function confirmation(){
        return view('presences.confirmation');
    }


    public function userlocal(Request $request)
    {
        // Valider les données entrantes
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:odcusers,email',
            'password' => 'required|string|min:8|confirmed',
            'activite' => 'required|exists:activites,id'
        ]);
        // $emailExists = Odcuser::where('email', $validated['email'])->exists();

        // if ($emailExists) {
        //     return redirect()->back()->with('error', 'Cet email est déjà utilisé.');
        // }

        $userlocal = Odcuser::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Création du candidat
       $candidat= Candidat::create([
            'odcuser_id' =>$userlocal->id,
            'activite_id' => $validated['activite'],
            'status'=> 'accept',

        ]);
        
      

        // Gestion de la présence
        $date = now()->format('Y-m-d');
        $presenceExists = Presence::where('candidat_id', $candidat->id)
            ->join('candidats', 'presences.candidat_id', '=', 'candidats.id')
            ->where('activite_id', $validated['activite'])
            ->whereDate('date', $date)
            ->exists();


        if (!$presenceExists) {
            $presence = new Presence;
            $presence->candidat_id = $candidat->id;
            $presence->date = now();
            $presence->save();
        } else {
            return redirect()->route('presences.activitencours')->with('error', 'La présence de ce candidat pour ce jour existe déjà');
        }

        return view('presences.confirmation')->with('success', 'Utilisateur créé avec succès.');
    }




    public function security(){
        $today = Carbon::today();
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
    
        return view('presences.securite', compact('activites'));

    }
    public function searchQuery(Request $request)
    {

        $data = Odcuser::select("first_name",  "last_name", "id")
            ->where("first_name", "LIKE", "%{$request->get('query')}%")
            ->limit(6)
            ->get();



        return response()->json($data);
    }
}
