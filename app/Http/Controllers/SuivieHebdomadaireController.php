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
        $date = $request->input('year');
        $data = Activite::whereYear("startDate", $date)->get();
        
        if ($data->isEmpty()) {
            return back()->with("erreur", "Pas d'activité pour l'année " . $date);
        }

        $export = new SuivieHebdomadaire($data);
        $fileName = $export->export();

        return response()->download(storage_path("app/public/{$fileName}"));
    }
}
