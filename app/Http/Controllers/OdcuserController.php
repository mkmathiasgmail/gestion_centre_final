<?php

namespace App\Http\Controllers;

use App\Models\Odcuser;
use App\Models\Candidat;
use App\Http\Requests\StoreOdcuserRequest;
use App\Http\Requests\UpdateOdcuserRequest;

class OdcuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $odcusers = Odcuser::latest()->get();
        if (request()->expectsJson()) {
            return response()->json($odcusers);
        }
    

        return view('odcusers.index', compact('odcusers'));
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
    public function store(StoreOdcuserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Odcuser $odcuser)
    {
        $nbrEvents = Candidat::where('odcuser_id', $odcuser->id)->count();
        $candidats = Candidat::where('odcuser_id', $odcuser->id)->with('candidat_attribute')->get();
        if (isset($candidats)) {
            foreach ($candidats as $candidat) {
                $datas = [] ;
                $array = $candidat->toArray();
                if (isset($candidat->candidat_attribute)) {
                    $labels = [];
                    foreach ($candidat->candidat_attribute as $attribute) {
                        $array[$attribute->label] = $attribute->value ;
                        if (!in_array($attribute->label, $labels)) {
                            $labels[] = $attribute->label ;
                        }
                    }
                    $datas[] = $array ;
                }
                
            }
        } else {
            echo "Sorry the user does not exist.";
        }

        return view('odcusers.show', compact('odcuser', 'candidats', 'nbrEvents', 'datas', 'labels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Odcuser $odcuser)
    {
        return view('odcusers.edit', compact('odcuser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOdcuserRequest $request, Odcuser $odcuser)
    {
        $odcuser->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'bithdate' => $request->bithdate,
            'phone' => $request->phone,
            'linkedin' => $request->linkedin,
            'profession' => $request->profession,
            'company' => $request->company,
            'university' => $request->university,
            'speciality' => $request->speciality,
            'country' => $request->country,
        ]);

        return redirect()->route('odcusers.index')->with('success', 'Odcuser updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Odcuser $odcuser)
    {
        //
    }
}
