<?php

namespace App\Http\Controllers\Api;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidat = Candidat::all();
        return response()->json($candidat) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'odcuser_id' => 'required',
            'activite_id' => 'required'
        ]);

        // Create a new Candidat record
        $candidat = Candidat::firstOrCreate([
            'odcuser_id' => $validatedData['odcuser_id'],
            'activite_id' => $validatedData['activite_id'],
            'status' => 'new' // Assuming default status is 1
        ]);
        return response()->json(['success' => true, 'candidat' => $candidat], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidat $candidat)
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
