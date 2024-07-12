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

        $activites = Activite::latest()->get();
        $typeEvent = TypeEvent::all();
        $categories = Categorie::all();
        $hashtag = Hashtag::all();


        try {

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
        } catch (\Exception $th) {
            return back()->withErrors(['error' => "An error occurred while creating the activity. $th"])->withInput();
        }
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

        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'categories' => 'required|exists:categories,id',
                'contents' => 'required|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
                'form_id' => 'nullable|exists:forms,id',
                'location' => 'nullable|string|max:255',
                'hashtags' => 'nullable|array',
                'hashtags.*' => 'exists:hashtags,id',
                'typeEvent' => 'nullable|array',
                'thumbnailURL' => 'nullable|array',
                'typeEvent.*' => 'exists:type_events,id',
            ],

            [
                'title.required' => 'The title is required.',
                'title.string' => 'The title must be a string.',
                'title.max' => 'The title may not be greater than 255 characters.',
                'categories.required' => 'The category is required.',
                'categories.exists' => 'The selected category is invalid.',
                'contents.required' => 'The content is required.',
                'contents.string' => 'The content must be a string.',
                'startDate.required' => 'The start date is required.',
                'startDate.date' => 'The start date must be a valid date.',
                'endDate.required' => 'The end date is required.',
                'endDate.date' => 'The end date must be a valid date.',
                'endDate.after_or_equal' => 'The end date must be a date after or equal to the start date.',
                'form_id.exists' => 'The selected form is invalid.',
                'creator.max' => 'The creator may not be greater than 255 characters.',
                'location.string' => 'The location must be a string.',
                'location.max' => 'The location may not be greater than 255 characters.',
                'hashtags.array' => 'The hashtags must be an array.',
                'hashtags.*.exists' => 'The selected hashtag is invalid.',
                'typeEvent.array' => 'The type events must be an array.',
                'typeEvent.*.exists' => 'The selected type event is invalid.',
            ]
        );

        try {
        $activites = Activite::create([
                'title' => $validatedData['title'],
                'categorie_id' => $validatedData['categories'],
                'content' => $validatedData['contents'],
                'start_date' => $validatedData['startDate'],
                'end_date' => $validatedData['endDate'],
                'publishStatus' => false,
                'showInSlider' => false,
                'send' => false,
                'form' => false,
                'miniatureColor' => false,
                'showInCalendar' => false,
                'liveStatus' => false,
                'bookASeat' => false,
                'isEvents' => false,
                'creator' => false,
                'location' => $validatedData['location'],
            ]);



            if ($request->has('hashtags')) {
                $activites->hashtag()->attach($validatedData['hashtags']);
            }

            if ($request->has('typeEvent')) {
                $activites->typEvent()->attach($validatedData['typeEvent']);
            }

            return redirect()->route('activites.index')->with('success', 'Activite created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => "An error occurred while creating the activity. $e"])->withInput();
        }
    }


    public function show(Activite $activite)
    {

        // Trouver l'Activite correspondant et récupérer le champ '_id'
        $id = $activite->id;
        $activite_Id = $activite->_id;

        $odcusers = Odcuser::all(['id', '_id']);
        //recuperer les presents  et la date
        $presences = Presence::orderBy('id')->get();
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
                $presence_date = [];
                foreach ($pres->toArray() as $key => $date) {
                    $presence_date[] = date('Y-m-d', strtotime($date['date']));
                }
                $candidatsPresence = $candidat->toArray();
                $candidatsPresence['date'] = $presence_date;
                $candidatsPresence['candidat_id'] = $candidat->id;
                $candidatsPresence['odcuser'] = $candidat->odcuser;

                $data[] = $candidatsPresence;
            } catch (\Throwable $th) {
                //echo $th->getMessage();
            }
        }
        return view('activites.show', compact('candidatsData', 'labels', 'data', 'activite', 'id', 'candidats', 'activite_Id', 'odcusers', 'fullDates', 'dates', 'countdate', 'presences'));
    }


    public function edit(Activite $activite)
    {
        $typeEvent = TypeEvent::all();
        $categories = Categorie::has('articles')->get();
        $hashtag = Hashtag::has('activite')->get();
        return view('activites.edit', compact('activite', 'typeEvent', 'categories', 'hashtag'));
    }

    public function update(Request $request, Activite $activite)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'categories' => 'required|exists:categories,id',
                'contents' => 'required|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
                'form_id' => 'nullable|exists:forms,id',
                'location' => 'nullable|string|max:255',
                'hashtags' => 'nullable|array',
                'hashtags.*' => 'exists:hashtags,id',
                'typeEvent' => 'nullable|array',
                'typeEvent.*' => 'exists:type_events,id',
            ],

            [
                'title.required' => 'The title is required.',
                'title.string' => 'The title must be a string.',
                'title.max' => 'The title may not be greater than 255 characters.',
                'categories.required' => 'The category is required.',
                'categories.exists' => 'The selected category is invalid.',
                'contents.required' => 'The content is required.',
                'contents.string' => 'The content must be a string.',
                'startDate.required' => 'The start date is required.',
                'startDate.date' => 'The start date must be a valid date.',
                'endDate.required' => 'The end date is required.',
                'endDate.date' => 'The end date must be a valid date.',
                'endDate.after_or_equal' => 'The end date must be a date after or equal to the start date.',
                'form_id.exists' => 'The selected form is invalid.',
                'creator.max' => 'The creator may not be greater than 255 characters.',
                'location.string' => 'The location must be a string.',
                'location.max' => 'The location may not be greater than 255 characters.',
                'hashtags.array' => 'The hashtags must be an array.',
                'hashtags.*.exists' => 'The selected hashtag is invalid.',
                'typeEvent.array' => 'The type events must be an array.',
                'typeEvent.*.exists' => 'The selected type event is invalid.',
            ]
        );

        try {
        $activite->update([
                'title' => $validatedData['title'],
                'categorie_id' => $validatedData['categories'],
                'contents' => $validatedData['content'],
                'start_date' => $validatedData['startDate'],
                'end_date' => $validatedData['endDate'],
                'location' => $validatedData['location'],
        ]);



            if ($request->has('hashtags')) {
                $activite->hashtag()->sync($validatedData['hashtags']);
            }

            if ($request->has('typeEvent')) {
                $activite->typEvent()->sync($validatedData['typeEvent']);
            }




            return redirect()->route('activites.index')
            ->with('success', 'Activite updated successfully.');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => "An error occurred while creating the activity. $th"])->withInput();
        }
    }

    public function destroy(Activite $activite)
    {

        try {
        $activite->delete();
        return redirect()->route('activites.index')
            ->with('success', 'Activite deleted successfully.');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => "An error occurred while creating the activity. $th"])->withInput();
        }
    }

    public function encours()
    {
        $today = Carbon::today();
        $activites = Activite::where('start_date', '<=', $today)->where('end_date', '>=', $today)->get();
        return view('encours', compact('activites'));
    }

    public function chartActivity()
    {
        $data = Activite::selectRaw("date_format(createdAt,'%Y-%m-%d') as date , count(*) as aggregate")->whereDate('createdAt', '>=', now()->subDays(30))->groupBy('date')->get();
        $activites=Activite::all();

        return view('dashboard',compact('data','activites',));
    }
}
