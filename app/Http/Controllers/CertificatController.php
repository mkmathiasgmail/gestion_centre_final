<?php

namespace App\Http\Controllers;

use ZipArchive;
use Dompdf\Dompdf;

use Dompdf\Options;
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
    public function vuecertificat($candidat)
    {
        $candidat = Candidat::find($candidat);
        $debut = new DateTimeImmutable($candidat->activite->start_date);
        $start_date = $debut->format("j F Y");

        $fin = new DateTimeImmutable($candidat->activite->end_date);
        $end_date = $fin->format("j F Y");
        //recperation des etablissement 
        $variables = ['Université', 'Etablissement', 'Structure'];

        $universiteLabelAttribute = DB::table('candidat_attributes')
        ->where(function ($query) use ($variables) {
            foreach ($variables as $value) {
                $query->orWhere('label', 'LIKE', "%{$value}%");
            }
        })
            ->where('candidat_id', $candidat->id)
            ->first();

        if ($universiteLabelAttribute) {
            $universiteValue = $universiteLabelAttribute->value;
        }

        $pdf = view('Templete_certificat.certificat_super_codeur_24_25', compact('candidat', 'universiteValue', 'start_date', 'end_date'));
    }

    public function generateCertificat($candidat)
    {
        set_time_limit(100000);
        $candidat = Candidat::find($candidat);

        $date = new DateTimeImmutable($candidat->activite->start_date);
        $format = $date->format("j F Y");

        $pdf = view('Templete_certificat.certificat_super_codeur_24_25', compact('candidat', 'universiteValue' ,'start_date', 'end_date'));
        // echo $pdf;
        // exit();

        //returner la vue a generer

        //$pdf = view('Templete_certificat.superCodeurCertificatGenerate', compact('candidat', 'start_date', 'end_date'));
        // echo $pdf;
        // exit();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($pdf);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('certificat.pdf');

        // return view('certificat.generateCertificat',compact('format','candidat'));
    }

    public  function generateAllCertificat($activite)
    {
        $id = Activite::find($activite);
        $idactivite= $id->id;

    
        $candidats = Candidat::where('activite_id', $idactivite)
                            ->where('status', 'accept')
                            ->select('id', 'odcuser_id', 'activite_id', 'status')
                            ->with(['odcuser', 'candidat_attribute'])
                            ->get();
        
        //extension de la classe ZipArchive pour stocké tous les certificats
        $zip = new ZipArchive();
        $zipFilename = 'certificats.zip';
        $zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Boucler sur chaque candidat et générer le certificat
        foreach ($candidats as $candidat) {

            set_time_limit(100000);
            //recperation des etablissement 
            $variables = ['Université', 'Etablissement', 'Structure'];

            $universiteLabelAttribute = DB::table('candidat_attributes')
            ->where(function ($query) use ($variables) {
                foreach ($variables as $value) {
                    $query->orWhere('label', 'LIKE', "%{$value}%");
                }
            })
            ->where('candidat_id', $candidat->id)
            ->first();
            
            if ($universiteLabelAttribute) {
                $universiteValue = $universiteLabelAttribute->value;
            }
            
        
            $debut = new DateTimeImmutable($candidat->activite->start_date);

            $start_date = $debut->format("j F Y");

            $fin = new DateTimeImmutable($candidat->activite->end_date);
            $end_date = $fin->format("j F Y");

            if ($selectcerificat == '4') {

                $pdf = view('Templete_certificat.certificat_super_codeur_24_25', compact('candidat', 'universiteValue', 'start_date', 'end_date'));
            }


            $pdf = view('Templete_certificat.certificat_super_codeur_24_25', compact('candidat', 'universiteValue', 'start_date', 'end_date'));

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($pdf);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
        
            $pdfContent = $dompdf->output();
            $filename = 'certificat_' . $candidat->id . '.pdf';
            $zip->addFromString($filename, $pdfContent);
        }

        $zip->close();
        return response()->download($zipFilename)->deleteFileAfterSend(true);
    }
}
