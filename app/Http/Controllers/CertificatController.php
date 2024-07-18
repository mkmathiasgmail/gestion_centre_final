<?php

namespace App\Http\Controllers;

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
        //
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

    public function generateCertificat()
    {
        //ini_set('max_execution_time', 300);
        // Définir les données à afficher dans le certificat
        $data = [
            [

            ]
        ];

        // Charger la vue Blade pour le certificat et passer les données
        $pdf = Pdf::loadView('certificat.indexCertificat', ['data' => $data]);

        // Télécharger le PDF
        return $pdf->download('certificat.pdf');
    }

}
