<?php

namespace App\Http\Controllers;

use DateTimeImmutable;
use App\Models\Activite;

use App\Models\Candidat;
use App\Models\Certificat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('certificat.indexCertificat');
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificat $certificat)
    {
        return view('certificat.show', compact('certificat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificat $certificat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificat $certificat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificat $certificat)
    {
        //
    }




    /**
     * Generate a certificate for a candidate and activity.
     */

    public function generateCertificat($candidat)
    {
        $candidat = Candidat::find($candidat);

        $date = new DateTimeImmutable($candidat->activite->start_date);
        $format = date_format($date, 'jS \o\f F Y');

        // $pdf = Pdf::loadView('certificat.generateCertificat', compact('candidat', 'format'));

        // set_time_limit(100000);
        // $pdf->set_paper("a4", "landscape");
        // return $pdf->download('certificat.pdf');


        return view('certificat.generateCertificat',compact('format','candidat'));
    }
}
