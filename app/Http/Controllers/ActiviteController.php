<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hashtag;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use App\Models\Categorie;
use App\Models\TypeEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ActiviteController extends Controller
{

    public function index()
    {


        $activites = Activite::all();
        $typeEvent = TypeEvent::all();
        $categories = Categorie::all();
        $hashtag = Hashtag::all();

        foreach ($activites as $activite) {
            $startDate = Carbon::parse($activite->startDate);
            $endDate = Carbon::parse($activite->endDate);


            $differenceInDays = $startDate->diffInDays($endDate);

            if ($differenceInDays == 0) {
                $activite->differenceInDays = 1;
            } else {
                $activite->differenceInDays = $differenceInDays;
            }
        }
        return view('activites.index', compact('activites', 'typeEvent', 'categories', 'hashtag'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $activites = Activite::create([
            'title' => $request->title,
            'categorie_id' => $request->categorie_id,
            'content' => $request->description,
            'startDate' => $request->date_debut,
            'endDate' => $request->date_fin,
            'publishStatus' => $request->publishStatus,
            'showInSlider' => $request->showInSlider,
            'send' => $request->send,
            'form' => $request->form,
            'miniatureColor' => $request->miniatureColor,
            'showInCalendar' => $request->showInCalendar,
            'liveStatus' => $request->liveStatus,
            'bookASeat' => $request->bookASeat,
            'isEvents' => $request->isEvents,
            'creator' => $request->create,
            'location' => $request->lieu,

        ]);

        $activites->hashtag()->attach($request->tags);
        $activites->typEvent()->attach($request->typeEvent);
        return redirect()->route('activites.index', compact('activites'));
    }


    public function show(Activite $activite)
    {
        // Trouver l'Activite correspondant et récupérer le champ '_id'
        $id = $activite->id;
        $activite_Id = $activite->_id;
        $url = env('API_URL');
        $odcusers = Odcuser::all(['id', '_id']);
        //recuperer les presents  et la date 
        $presences= Presence::orderBy('id')->get();
        $test = Presence::all();
       

        $activite = Activite::findOrFail($id);
        $dateDebut = Carbon::parse($activite->startDate);
        $dateFin = Carbon::parse($activite->endDate);

        $dates = [];
        $fullDates = [];
        for ($date = $dateDebut; $date->lte($dateFin); $date->addDay()) {
            if (!$date->isWeekend()) {
                $dates[] = $date->format('d-m');
                $fullDates[] = $date->format('d-m-Y');
                //dd($fullDates);
            }
        }
        // dd($dates);
        $countdate = count($dates);

        $candidats = Candidat::where('activite_id', $id)->with(['presence', 'odcuser'
        ])->get();
        $data = [];
        foreach ($candidats as $candidat) {
            $pres = Presence::where('candidat_id', $candidat->id)->pluck('date');
            $p = $pres->toArray();
            $candidatsPresence = $candidat->toArray();
            $candidatsPresence['date'] = $p;
            $candidatsPresence['candidat_id'] = $candidat->id;

            $data[] = $candidatsPresence;
        }
        return view('activites.show', compact('test', 'p', 'data', 'activite', 'id', 'candidats', 'activite_Id', 'odcusers', 'fullDates', 'dates', 'presences', 'countdate'));
    }


    public function edit(Activite $activite)
    {
        $typeEvent = TypeEvent::has('activite')->get();
        $categories = Categorie::has('articles')->get();
        $hashtag = Hashtag::has('activite')->get();
        return view('activites.edit', compact('activite', 'typeEvent', 'categories', 'hashtag'));
    }


    public function update(Request $request, Activite $activite)
    {
        $activite->update($request->all());
        return redirect()->route('activites.index')
            ->with('success', 'Activite updated successfully.');
    }

    public function destroy(Activite $activite)
    {
        $activite->delete();
        return redirect()->route('activites.index')
            ->with('success', 'Activite deleted successfully.');
    }

    public function encours()
    {
        $today = Carbon::today();
        $activites = Activite::where('startDate', '<=', $today)->where('endDate', '>=', $today)->get();
        return view('encours', compact('activites'));
    }
}
