<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Categorie;
use App\Models\Hashtag;
use App\Models\TypeEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ActiviteController extends Controller
{

    public function index()
    {
        $activites = Activite::all();
        $typeEvent=TypeEvent::all();
        $categories=Categorie::all();
        $hashtag=Hashtag::all();
        return view('activites.index', compact('activites','typeEvent','categories','hashtag'));
    }

    public function create()
    {

        $categories = Categorie::all();
        return view("components.form", compact("categories"));
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
        $show = $activite;
        $activite_Id = $activite->_id;
        $url = env('API_URL');
        $odcusers = Odcuser::all(['id', '_id']);

        // Récupérer les candidats liés à cette activité
        $candidats = Candidat::where('activite_id', $id)->get();
        return view('activites.show', compact('show', 'id', 'candidats', 'activite_Id', 'odcusers'));
    }


    public function edit(Activite $activite)
    {
        $typeEvent = TypeEvent::has('activite')->get();
        $categories = Categorie::has('articles')->get();
        $hashtag = Hashtag::has('activite')->get();
        return view('activites.edit',compact('activite','typeEvent','categories','hashtag'));
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
