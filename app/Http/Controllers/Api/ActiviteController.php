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
        $url = env('API_URL');
        foreach ($request->input('content') as $content) {
            if ($content['type'] === 'paragraph') {




                $activite = [
                    "title" => $request->title,
                    "categories" => $request->categories,
                    "hashtags" => $request->hashtags,
                    "content" => $request->contents,
                    "form" => $request->form,
                    "thumbnail_url" => $request->thumbnailURL,
                    "endDate" => $request->endDate,
                    "startDate" => $request->startDate,
                    "location" => $request->location,
                    "contents" => [
                        [
                            'id' => uniqid(),
                            'type' => 'paragraphe',
                            'data' => [
                                'text' => $content['text'],

                            ],
                        ],

                        [
                            'id' => uniqid(),
                            'type' => 'contents',
                            'data' => [
                                'content' => $request->contents,

                            ],
                        ]


                    ],

                ];

        try {

                    $requette = Http::timeout(100)
                        ->post("$url/events/create", $activite);

                    // Check if the request was successful
                    if ($requette->successful()) {
                        return response()->json(['success' => true, 'data' => $requette->json()], 201);
                    } else {
                        return response()->json(['success' => false, 'message' => 'Erreur lors de la création de l\'événement', 'error' => $requette->body()], $requette->status());
                    }
                } catch (\Exception $e) {

                    return response()->json(['success' => false, 'message' => 'Request failed', 'error' => $e->getMessage()], 500);
                }
            } elseif ($content['type'] === 'socialMedia') {
                $activite = [
                    "title" => $request->title,
                    "categories" => $request->categories,
                    "hashtags" => $request->hashtags,
                    "content" => $request->contents,
                    "form" => $request->form,
                    "thumbnailURL" => $request->thumbnailURL,
                    "endDate" => $request->endDate,
                    "startDate" => $request->startDate,
                    "location" => $request->location,
                    "contents" => [
                        'id' => uniqid(),
                        'type' => 'socialmedia',
                        'data' => [
                            'link' => $content['link'],

                        ],
                    ],


                ];

                try {

                    $requette = Http::timeout(100)
                        ->post("$url/events/create", $activite);

                    // Check if the request was successful
                    if ($requette->successful()) {
                        return response()->json(['success' => true, 'data' => $requette->json()], 201);
                    } else {
                        return response()->json(['success' => false, 'message' => 'Erreur lors de la création de l\'événement', 'error' => $requette->body()], $requette->status());
                    }
                } catch (\Exception $e) {

                    return response()->json(['success' => false, 'message' => 'Request failed', 'error' => $e->getMessage()], 500);
                }
            }
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
    public function getActiviteRecent()
    {

        $activiteRecent = Activite::select('id', 'title', 'content', 'start_date', 'end_date')
        ->where('start_date', '<', now())
            ->latest()
            ->paginate(5);


        $activitefutur = Activite::select('id', 'title', 'content','start_date', 'end_date')
        ->where('start_date', '>', now())
            ->latest()
            ->paginate(5);


        $activites = $activiteRecent->merge($activitefutur);

        return response()->json($activites);
    }
}

