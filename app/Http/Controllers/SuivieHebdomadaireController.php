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
            ->leftjoin('categories as ca', 'ca.id', '=', 'activites.categorie_id')
            ->whereYear("activites.start_date", $date)
            ->select(
                'activites.title',
                'activites.location', 
                'activites.start_date', 
                'activites.end_date', 
                'activites.number_hour', 
                'ca.name', 
                DB::raw('COUNT(cand.status) as cand_count'),
                DB::raw('COUNT(DISTINCT CASE WHEN pre.candidat_id IS NOT NULL AND od.gender = "male" THEN pre.candidat_id ELSE NULL END) as male_count'),
                DB::raw('COUNT(DISTINCT CASE WHEN pre.candidat_id IS NOT NULL AND od.gender = "female" THEN pre.candidat_id ELSE NULL END) as female_count'),
                DB::raw('COUNT(DISTINCT pre.candidat_id) as pre_count')
            )
            ->groupBy('activites.title', 'activites.location', 'activites.start_date', 'activites.end_date', 'ca.name', 'activites.number_hour')
            ->distinct('ca.id')
            ->get();
        
        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour l'année " . $date);
        }

        $export = new SuivieHebdomadaire($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }
}
