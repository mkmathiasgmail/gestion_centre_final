<?php

namespace App\Http\Controllers;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidatRequest;
use App\Http\Requests\UpdateCandidatRequest;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidats = Candidat::has('odcuser')->get();

        return view('candidats.index', compact('candidats')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'odcuser_id' => 'required|string',
            'activite_id' => 'required|string'
        ]);

        // Find the Odcuser and Activite by their respective _id fields
        $odcuser = Odcuser::where('_id', $validatedData['odcuser_id'])->first();
        $activite = Activite::where('_id', $validatedData['activite_id'])->first();

        if ($odcuser && $activite) {
            // Create a new Candidat record
            $candidat = Candidat::create([
                'odcuser_id' => $odcuser->id,
                'activite_id' => $activite->id,
                'status' => 1 // Assuming default status is 1
            ]);

            return response()->json(['success' => true, 'candidat' => $candidat], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'User or Event not found'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        return view('candidats.show', compact('candidat')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatRequest $request, Candidat $candidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat)
    {
        //
    }
}
