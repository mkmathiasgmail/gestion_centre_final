<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\SuivieHebdomadaire;
use App\Models\Activite;
use Illuminate\Http\Request;

class SuivieHebdomadaireController extends Controller
{
    public function suivieHebdomadaireExport(Request $request)
    {
        $date = $request->input('month');
        $carbonDate = Carbon::parse($date);
        $month = $carbonDate->format("m");
        $year = $carbonDate->format("Y");
        $data = Activite::select("startDate")->whereMonth("startDate", $month)->whereYear("startDate", $year)->get();
        
        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour ce mois du " . $carbonDate->format("F Y"));
        }

        $export = new SuivieHebdomadaire($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }
}
