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
use App\Http\Requests\UpdatePresenceRequest;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presences = Presence::orderBy('id')->get();
        return view('presences.presence', compact('presence','candidat'));
    }

    public function userlocal(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'idactivite' => 'required|int',
        ]);
        $userlocal = new Userlocal;
        $userlocal->first_name = $validated['first_name'];
        $userlocal->last_name = $validated['last_name'];
        $userlocal->email = $validated['email'];
        $userlocal->password = $validated['password'];
        $userlocal->idactivite = $validated['idactivite'];



        
        return redirect(route('activitencours'));

    }
       
}
 

