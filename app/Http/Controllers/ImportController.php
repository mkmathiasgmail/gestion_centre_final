<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    //
    public function index()
    {
        $activites = Activite::all();
        return view('import.import', ['activites' => $activites]);
    }
}
