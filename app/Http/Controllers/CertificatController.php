<?php

namespace App\Http\Controllers;

use ZipArchive;
use Carbon\Carbon;

use Dompdf\Dompdf;
use Dompdf\Options;
use DateTimeImmutable;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Certificat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CandidatAttribute;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request) {}

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

        $pdf = view('Templete_certificat.certificat_super_codeur_31_02', compact('candidat', 'universiteValue', 'start_date', 'end_date'));
    }

    public function generateCertificat($candidat)
    {
        set_time_limit(100000);
        $candidat = Candidat::find($candidat);
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


        // Définir la locale en français
        Carbon::setLocale('fr');

        $debut = new Carbon($candidat->activite->start_date);
        $start_date = $debut->isoFormat('D MMMM'); // Formatage en français

        $fin = new Carbon($candidat->activite->end_date);
        $end_date = $fin->isoFormat('D MMMM YYYY'); // Formatage en français
 
        $dateActuelle = Carbon::now();

        // Formater la date
        $dateFormatee = $dateActuelle->isoFormat('D MMMM YYYY');


        $pdf = view('Templete_certificat.certificat_maker_junior_stand', compact('candidat', 'universiteValue' ,'start_date', 'end_date', 'dateFormatee'));
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
        $dompdf->setPaper('A4', 'landscape',);
        $dompdf->render();
        return $dompdf->stream("Certificat_" . $candidat->odcuser->first_name . "_" . $candidat->odcuser->last_name . ".pdf");

        // return view('certificat.generateCertificat',compact('format','candidat'));
    }

    public  function generateAllCertificat(Request $request, $activite)
    {
        $id = Activite::find($activite);
        $idactivite = $id->id;
        $selectcerificat = $request->input('certificat');



        $candidats = Candidat::where('activite_id', $idactivite)
            ->where('status', 'accept')
            ->select('id', 'odcuser_id', 'activite_id', 'status')
            ->with(['odcuser', 'candidat_attribute'])
            ->get();


        //extension de la classe ZipArchive pour stocké tous les certificats
        $zip = new ZipArchive();
        $zipFilename = "certificats_" . $id->title . ".zip";
        $zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Boucler sur chaque candidat et générer le certificat
        foreach ($candidats as $candidat) {

            set_time_limit(100000);
            // Récupération de l'université du candidat dans la table candidat_attributes et odcusers
            $variables = ['Université', 'Etablissement', 'Structure', 'Entreprise', 'Si autre université'];

            $universiteLabelAttribute = DB::table('candidat_attributes')
            ->where(function ($query) use ($variables) {
                foreach ($variables as $value) {
                    $query->orWhere('label', 'LIKE', "%{$value}%");
                }
            })
                ->where('candidat_id', $candidat->id)
                ->first();
                
            $universiteValue = '';
            if ($universiteLabelAttribute) {
                $universiteValue = $universiteLabelAttribute->value;
            } elseif ($universiteValue === null) {
                $odcusers = Odcuser::where('id', $candidat->id)
                    ->get();
                if (request()->expectsJson()) {
                    return response()->json($odcusers);
                }
                foreach ($odcusers as $key => $odcuser) {
                    $detail_profession = json_decode($odcuser->detail_profession, true);
                    $universiteValue = $detail_profession['university'] ?? '';
                }
            } else {
                $universiteValue = '';
            }

            // Définir la locale en français
            Carbon::setLocale('fr');

            // Créer un objet Carbon pour la date de début
            $debut = new Carbon($candidat->activite->start_date);
            $start_date = $debut->isoFormat('LLLL'); // Formatage en français

            // Créer un objet Carbon pour la date de fin
            $fin = new Carbon($candidat->activite->end_date);
            $end_date = $fin->isoFormat('LLLL'); // Formatage en français

            if ($selectcerificat == '4') {

                $pdf = view('Templete_certificat.certificat_super_codeur_31_02', compact('candidat', 'universiteValue', 'start_date', 'end_date'));
            }


            $pdf = view('Templete_certificat.certificat_super_codeur_31_02', compact('candidat', 'universiteValue', 'start_date', 'end_date'));

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($pdf);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $pdfContent = $dompdf->output();
            $filename = "Certificat_" . $candidat->odcuser->first_name . "_" . $candidat->odcuser->last_name . ".pdf";
            $zip->addFromString($filename, $pdfContent);
        }

        $zip->close();
        return response()->download($zipFilename)->deleteFileAfterSend(true);
    }
}