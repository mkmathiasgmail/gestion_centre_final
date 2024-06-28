<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use App\Http\Requests\StoreTypeEventRequest;
use App\Http\Requests\UpdateTypeEventRequest;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $typEvent= TypeEvent::all();
    return view('typEvents.index',compact("typEvent"));
    
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
        $typeEvent = TypeEvent::create([
            'code' => $request->code,
            'typeEvent' => $request->type,
        
        ]);

        return redirect()->route('typevents.index', compact('typeEvent'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeEventRequest $request, TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeEvent $typeEvent)
    {
        //
    }
}
