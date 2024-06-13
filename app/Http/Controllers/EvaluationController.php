<?php

namespace App\Http\Controllers;

use App\Exports\MonthlyPlanningExport;
use App\Models\Activite;
use App\Models\Evaluation;
use Carbon\Carbon;
use Illuminate\Http\Request;
class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("evaluations.index");
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }

    public function monthlyPlanningExport(Request $request)
    {
        $date = $request->input('month');
        $carbonDate = Carbon::parse($date);
        $month = $carbonDate->format("m");
        $year = $carbonDate->format("Y");
        $data = Activite::select("date_debut")->whereMonth("date_debut", $month)->whereYear("date_debut", $year)->get();

        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour ce mois du " . $carbonDate->format("F Y"));
        }

        $export = new MonthlyPlanningExport($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }

    public function suivieHebdomadaireExport(Request $request)
    {
        // 
    }
}
