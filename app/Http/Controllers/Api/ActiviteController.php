<?php

namespace App\Http\Controllers\Api;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activite = Activite::all();
        return response()->json($activite);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $activite = [
            "title" => $request->title,
            "categories" => $request->categories,
            "hashtags" => $request->hashtags,
            "content" => $request->contents,
            "form" => $request->form,
            "thumbnailURL"=>$request->thumbnailURL,
            "endDate" => $request->endDate,
            "startDate" => $request->startDate,
            "location" => $request->location,
        ];

        try {
           
            $requette = Http::timeout(100)
                ->post('http://10.143.41.70:8000/2024/odc/public/api/events/create', $activite);

            // Check if the request was successful
            if ($requette->successful()) {
                return response()->json(['success' => true, 'data' => $requette->json()], 201);
            } else {
                return response()->json(['success' => false, 'message' => 'Erreur lors de la création de l\'événement', 'error' => $requette->body()], $requette->status());
            }
        } catch (\Exception $e) {
          
            return response()->json(['success' => false, 'message' => 'Request failed', 'error' => $e->getMessage()], 500);
        }


        // Return the created event
        
    }

   
    

    /**
     * Display the specified resource.
     */
    public function show(Activite $activite)
    {
        return response()->json($activite);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activite $activite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activite $activite)
    {
        //
    }
}
