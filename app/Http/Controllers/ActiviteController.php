<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\Hashtag;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\CandidatAttribute;
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
        $typeEvent = TypeEvent::all();
        $categories = Categorie::all();
        $hashtag = Hashtag::all();

        foreach ($activites as $activite) {
            $startDate = Carbon::parse($activite->startDate);
            $endDate = Carbon::parse($activite->endDate);



            $differenceInDays = $startDate->diffInDays($endDate);

            if ($differenceInDays == 0) {
            if ($differenceInDays == 0) {
                $activite->differenceInDays = 1;
            } else {
            } else {
                $activite->differenceInDays = $differenceInDays;
            }
        }
        return view('activites.index', compact('activites', 'typeEvent', 'categories', 'hashtag'));
        return view('activites.index', compact('activites', 'typeEvent', 'categories', 'hashtag'));
    }

    public function create()
    {
        $activites = Activite::all();
        $typeEvent = TypeEvent::all();
        $categories = Categorie::all();
        $forms= Form::all();
        $hashtag = Hashtag::all();
        return view('activites.create', compact('activites', 'typeEvent', 'categories', 'hashtag','forms'));
      
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
        return redirect()->route('activites.index', compact('activites'))->with('success', 'Activite created successfully.');
    }


    public function show(Activite $activite)
    {
        // Trouver l'Activite correspondant et récupérer le champ '_id'
        $id = $activite->id;
        $activite_Id = $activite->_id;

        $odcusers = Odcuser::all(['id', '_id']);

        // Récupérer les candidats liés à cette activité
        $candidats = Candidat::where('activite_id', $id)->with(['odcuser', 'candidat_attribute'])->get();
        $candidatsData = [];
        $labels = [];
        foreach ($candidats as $candidat) {
            $candidatArray = $candidat->toArray();
            if ($candidat->candidat_attribute) {
                foreach ($candidat->candidat_attribute as $attribute) {
                    $candidatArray[$attribute->label] = $attribute->value;
                    if (!in_array($attribute->label, $labels)) {
                        $labels[] = $attribute->label;
                    }
                }
            }
            $candidatsData[] = $candidatArray;
        }
        //recuperer les presents  et la date 

        $presences = Presence::orderBy('id')->get();
        $activite = Activite::findOrFail($id);
        $dateDebut = Carbon::parse($activite->startDate);
        $dateFin = Carbon::parse($activite->endDate);

        $dates = [];
        for ($date = $dateDebut; $date->lte($dateFin); $date->addDay()) {
            if (!$date->isWeekend()) {
                $dates[] = $date->format('d');
            }
        }
        return view('activites.show', compact('candidatsData', 'labels', 'activite', 'id', 'candidats', 'activite_Id', 'odcusers', 'dates', 'presences'));
    }


    public function edit(Activite $activite)
    {
        $typeEvent = TypeEvent::has('activite')->get();
        $categories = Categorie::has('articles')->get();
        $hashtag = Hashtag::has('activite')->get();
        return view('activites.edit', compact('activite', 'typeEvent', 'categories', 'hashtag'));
        return view('activites.edit', compact('activite', 'typeEvent', 'categories', 'hashtag'));
    }


    public function update(Request $request, Activite $activite)
    {
        $category = Categorie::firstOrCreate(['categorie' => $request->categorie_id]);


        // Mise à jour de l'activité
        $activite->update([
            'title' => $request->title,
            'categorie_id' => $category->id,
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


        $hashtagIds = [];
        if ($request->hashtags) {
            foreach ($request->tags as $hashtagName) {
                $hashtag = Hashtag::firstOrCreate(['hashtags' => $hashtagName]);
                $hashtagIds[] = $hashtag->id;
            }
        }

        if ($request->typeEvent) {
            $typeventIds = [];
            foreach ($request->typeEvent as $typeEventName) {
                $typeEvent = TypeEvent::firstOrCreate(['typeEvent' => $typeEventName, 'code' => '']);
                $typeventIds[] = $typeEvent->id;
            }
            $activite->typeEvent()->sync($typeventIds);
        }

        $activite->hashtag()->sync($hashtagIds);
        $activite->typEvent()->sync($typeventIds);
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
