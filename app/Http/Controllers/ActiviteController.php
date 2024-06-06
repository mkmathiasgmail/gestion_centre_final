<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    
    public function index(){
        $activite= Activite::all();
        return view('activites.index',compact('activite'));
    }

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $activites = Activite::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'lieu' => 'kinshasa',
            'status' => 1,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin
        ]);

    
        return redirect()->route('activites.index', compact('activites'));
    }


    public function show(Activite $activite)
    {
        $show= $activite;
        return view('activites.show',compact('show'));
    }

    
    public function edit(Activite $activite)
    {
        //
    }

   
    public function update(Request $request, Activite $activite)
    {
        //
    }

    
    public function destroy(Activite $activite)
    {
        //
    }


    Public function encours(){

        $today= Carbon::today();

        $activites= Activite::where('date_debut','<=',$today)->where('date_fin','>=',$today)->get();

        return view('encours',compact('activites'));
       



       


    }
}
