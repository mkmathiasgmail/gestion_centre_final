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
            $message = Carbon::today();
            $startDate = Carbon::parse($activite->start_date);
            $endDate = Carbon::parse($activite->end_date);
            if ($message >= $startDate && $message <= $endDate) {

                $activite->message = 'En cours';
            } elseif ($message < $startDate) {


                $differenceInDays = $startDate->diffInDays($message);
                $activite->message = "Il y a une activité à venir $differenceInDays jours";
            } else {
                $activite->message = 'Terminée';
            }
        }

        return view('activites.index', compact('activites', 'typeEvent', 'categories', 'hashtag',));
    }

    public function create()
    {
        $activites = Activite::all();
        $typeEvent = TypeEvent::all();
        $categories = Categorie::all();
        $forms = Form::all();
        $hashtag = Hashtag::all();
        return view('activites.create', compact('activites', 'typeEvent', 'categories', 'hashtag', 'forms'));
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
        //recuperer les presents  et la date 
        $presences = Presence::orderBy('id')->get();
        $test = Presence::all();



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
        $dateDebut = Carbon::parse($activite->start_date);
        $dateFin = Carbon::parse($activite->end_date);

        $dates = [];
        $fullDates = [];
        for ($date = $dateDebut; $date->lte($dateFin); $date->addDay()) {
            if (!$date->isWeekend()) {
                $dates[] = $date->format('d-m');
                $fullDates[] = $date->format('Y-m-d');
            }
        }
        // dd($dates);
        $countdate = count($dates);

        $candidats_on_activity = Candidat::where('activite_id', $id)->with('odcuser')->get();
        $data = [];
        $pres = Presence::all()->pluck('candidat_id');
        foreach ($candidats_on_activity as $candidat) { 
            $pres = Presence::where('candidat_id', $candidat->id)->get();
            try {
                $date = $pres->toArray();
                $presence_date = [] ;
                foreach ($pres->toArray() as $key => $date) {
                    $presence_date[] = date('Y-m-d', strtotime($date['date'])) ;
                }
                $candidatsPresence = $candidat->toArray();
                $candidatsPresence['date'] = $presence_date;
                $candidatsPresence['candidat_id'] = $candidat->id;
                $candidatsPresence['odcuser'] = $candidat->odcuser ;
                
                $data[] = $candidatsPresence;
            } catch (\Throwable $th) {
                //echo $th->getMessage();
            }
        }
        return view('activites.show', compact('candidatsData', 'labels', 'data', 'activite', 'id', 'candidats', 'activite_Id', 'odcusers', 'fullDates', 'dates', 'countdate', 'presences'));

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

        // $request->validate([
        //     'title' => [
        //         'required',
        //         'string',
        //         'max:255'
                
        //     ],
        //     'categorie' => 'required|integer',
        //     'description' => 'required|string',
        //     'date_debut' => 'required|date',
        //     'date_fin' => 'required|date|after_or_equal:date_debut',
        //     'publishStatus' => 'required|boolean',
        //     'showInSlider' => 'required|boolean',
        //     'send' => 'required|boolean',
        //     'form' => 'required|string',
        //     'miniatureColor' => 'required|string',
        //     'showInCalendar' => 'required|boolean',
        //     'liveStatus' => 'required|boolean',
        //     'bookASeat' => 'required|boolean',
        //     'isEvents' => 'required|boolean',
        //     'create' => 'required|string',
        //     'lieu' => 'required|string',
        //     'tags' => 'required|array',
        //     'tags.*' => 'integer',
        //     'typeEvent' => 'required|array',
        //     'typeEvent.*' => 'integer',
        // ]);

        
        $activites = Activite::findOrFail($activite->id);
        // Mise à jour de l'activité
        $activites->update([
            'title' => $request->title,
            'categorie_id' => $request->categorie,
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
  





        $activites->hashtag()->sync($request->tags);
        $activites->typEvent()->sync($request->typeEvent);


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
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
        return view('encours', compact('activites'));
    }
}
