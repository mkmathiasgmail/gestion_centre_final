<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MonthlyPlanningExport;
use App\Models\Activite;
use Carbon\Carbon;

class MonthlyPlanningController extends Controller
{
    public function monthlyPlanningExport(Request $request)
    {
        $date = $request->input('month');
        $carbonDate = Carbon::parse($date);
        $month = $carbonDate->format("m");
        $year = $carbonDate->format("Y");
        $data = Activite::select("startDate")->whereMonth("startDate", $month)->whereYear("startDate", $year)->get();
        
        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour ce mois du " . $carbonDate->format("F Y"));
        }

        $export = new MonthlyPlanningExport($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }

}
