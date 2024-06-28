<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\SuivieHebdomadaire;

class SuivieHebdomadaireController extends Controller
{
    public function suivieHebdomadaireExport(Request $request)
    {
        $date = $request->input('years');
        $data = DB::table('activites')
            ->leftjoin('candidats as cand', 'cand.activite_id', '=', 'activites.id')
            ->leftjoin('odcusers as od', 'od.id', '=', 'cand.odcuser_id')
            ->leftjoin('presences as pre', 'pre.candidat_id', '=', 'cand.id')
            ->whereYear("activites.startDate", $date)
            ->select(
                'activites.title',
                'activites.location', 
                'activites.startDate', 
                'activites.endDate', 
                DB::raw('COUNT(cand.status) as cand_count'),
                DB::raw('SUM(CASE WHEN od.gender = "male" THEN 1 ELSE 0 END) as male_count'),
                DB::raw('SUM(CASE WHEN od.gender = "female" THEN 1 ELSE 0 END) as female_count'),
                DB::raw('SUM(CASE WHEN pre.candidat_id IS NOT NULL THEN 1 ELSE 0 END) as pre_count')
            )
            ->groupBy('activites.title', 'activites.location', 'activites.startDate', 'activites.endDate')
            ->get();
        
        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour l'année " . $date);
        }

        $export = new SuivieHebdomadaire($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }
}
