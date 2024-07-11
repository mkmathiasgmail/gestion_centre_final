<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Categorie;
use App\Models\TypeEvent;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types=TypeEvent::all();
        $categories=Categorie::all();    
        return view("evaluations.index",compact("types","categories"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
    public function wenzory(Request $request)
{
    // Créer une nouvelle feuille Excel
    $wenzorysheet = new Spreadsheet();
    $sheet = $wenzorysheet->getActiveSheet();

    // Récupérer tous les types et toutes les catégories
    $allTypes = TypeEvent::all();
    $allCategories = Categorie::all();

    // Récupérer les catégories et les types sélectionnés
    $selectType = $request->input('type');
    $selectCategories = $request->input('categorie');
    $monthYear = $request->get('monthYear');

    // Filtrer les types et les catégories en fonction des valeurs sélectionnées
    $types = $allTypes->whereIn('id', $selectType);
    $categories = $allCategories->whereIn('id', $selectCategories);

    // Récupérer les activités du mois et de l'année sélectionnés
    $activites = Activite::whereMonth('createdAt', date('m', strtotime($monthYear)))
                        ->whereYear('createdAt', date('Y', strtotime($monthYear)))
                        ->whereHas('categorie', function ($query) use ($selectCategories) {
                            $query->whereIn('id', $selectCategories);
                        })
                        ->get();

    // Écrire les types dans la feuille Excel
    if ($types->count() > 0) {
        $sheet->mergeCells('A5:B5');
        $sheet->setCellValue('A5', implode(', ', $types->pluck('typeEvent')->toArray()));
    }

    // Écrire les catégories dans la feuille Excel
    if ($categories->count() > 0) {
        $sheet->mergeCells('A2:B2');
        $sheet->setCellValue('A2', implode(', ', $categories->pluck('categorie')->toArray()));
    }

    // Écrire le mois et l'année dans la feuille Excel
    $sheet->mergeCells('A3:B3');
    $sheet->setCellValue('A3', $monthYear);

    // Écrire les activités dans la feuille Excel
    $row = 7;
    foreach ($activites as $activite) {
        $sheet->setCellValue('A' . $row, $activite->categorie->categorie);
        if ($activite->typeEvent) {
            $sheet->setCellValue('B' . $row, $activite->typeEvent->typeEvent);
        } else {
            $sheet->setCellValue('B' . $row, 'Aucun type d\'événement');
        }
        $row++;
    }

    $writer = new Xlsx($wenzorysheet);
    $fileName = 'rapportwenzory.xlsx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $writer->save($tempFile);

    // Renvoyer le fichier Excel au navigateur
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
}
