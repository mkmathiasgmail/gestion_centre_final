<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class RapportSemestrielController extends Controller
{
    public function exportToExcel(){
        //On recuper les données depuis le model
        $candidats= Candidat::with('activite')->get();
        //on cree un nouveau classeur PhpSpreadsheet
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        //premiere section du tableau
        $worksheet->mergeCells('A1:K1');
        $worksheet->setCellValue('A1', 'Data');
        $worksheet->getStyle('A1')
        ->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->setStartColor(new Color('ffd966'));
    //pour l'allignement
    $worksheet->getStyle('A1')
        ->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $worksheet->mergeCells('A2:J2');
        $worksheet->setCellValue('A2', 'learner data');
        $worksheet->getStyle('A2')
        ->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->setStartColor(new Color('ddebf7'));
    
    $worksheet->getStyle('A2')
        ->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_CENTER);


// fonction pour les couleurs des colonnes
function applyColorToColumn(Worksheet $worksheet, int $startRow, int $maxRows, string $columnLetter, string $color)
{ //la couleur aux lignes spécifiques

    for ($row = $startRow; $row<= $startRow + $maxRows -1; $row++){
        $worksheet->getStyle($columnLetter . $row)->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setARGB($color);
    }

    //couleur pour les lignes suivante

    $lastRow =$worksheet->getHighestRow();
    for($row = $startRow +$maxRows; $row <= $lastRow; $row++){
        $worksheet->getStyle($columnLetter . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($color);
    }
}

//Colonne colorer
$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'C', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'D', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'E', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'L', 'fff2cc' );

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'M', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'Q', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'X', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'Y', 'fff2cc');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 4, 50, 'AD', 'fff2cc');


//colonne separateur de section

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 1, 50, 'K', 'aeaaaa');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 1, 50, 'P', 'aeaaaa');

$worksheet=$spreadsheet->getActiveSheet(); 
applyColorToColumn($worksheet, 1, 50, 'W', 'aeaaaa');

$worksheet=$spreadsheet->getActiveSheet();
applyColorToColumn($worksheet, 1, 50, 'AB', 'aeaaaa');

    
        //on  defini les en-têtes de colonne        
        $worksheet->setCellValue('A3', 'name')
                    ->getStyle('A3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('B3', 'last_name')
                    ->getStyle('B3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('C3', 'gender')
                    ->getStyle('C3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);    
        $worksheet->setCellValue('D3', 'Age')
                    ->getStyle('D3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('E3', 'socio_professional')
                    ->getStyle('E3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('F3', 'if student_university')
                    ->getStyle('F3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('G3', 'if student_speciality')
                    ->getStyle('G3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('H3', 'e_mail')
                    ->getStyle('H3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('I3', 'phone_number')
                    ->getStyle('I3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('J3', 'linkedin')
                    ->getStyle('J3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);

        // Centrer les en-têtes
$worksheet->getStyle('A3:AH3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Descendre les titres longs sur plusieurs lignes
$worksheet->getCell('E3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('F3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('G3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('N3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('O3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('R3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('S3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('T3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('U3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('V3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('Z3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('AA3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('AC3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('AB3')->getStyle()->getAlignment()->setWrapText(true);
$worksheet->getCell('AC3')->getStyle()->getAlignment()->setWrapText(true);


        
        //la taille (longueur) des lignes des entetes

        $worksheet->getRowDimension(3)->setRowHeight(25);
        //longueur des lignes
        $startColumn = 'A'; // Première colonne à modifier
        $endColumn = 'AF'; // Dernière colonne à modifier
        $newColumnWidth = 25; // Nouvelle largeur de colonne en points

for ($column = $startColumn; $column <= $endColumn; $column++) {
    $worksheet->getColumnDimension($column)->setWidth($newColumnWidth);
}

//ligne de separation et taille
$columnLetter = 'K'; // Colonne à modifier
$newColumnWidth = 3; // Nouvelle largeur de colonne en points

$worksheet->getColumnDimension($columnLetter)->setWidth($newColumnWidth);

$columnLetter = 'P';
$newColumnWidth = 3;

$worksheet->getColumnDimension($columnLetter)->setWidth($newColumnWidth);

$columnLetter = 'W';
$newColumnWidth = 3;
$worksheet->getColumnDimension($columnLetter)->setWidth($newColumnWidth);

$columnLetter = 'AB';
$newColumnWidth = 3;
$worksheet->getColumnDimension($columnLetter)->setWidth($newColumnWidth);   


//Remplissage de données 
        $row = 4;

        foreach($candidats as $candidat){
            $worksheet->setCellValue('A'.$row, $candidat->name)
                        ->getStyle('A'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('B'.$row, $candidat->last_name)
                        ->getStyle('B'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('C'.$row, $candidat->gender)
                        ->getStyle('C'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('D'.$row, $candidat->years)
                        ->getStyle('D'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('E'.$row, $candidat->socio_professional)
                        ->getStyle('E'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('F'.$row, $candidat->student_university)
                        ->getStyle('F'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('G'.$row, $candidat->student_speciality)
                        ->getStyle('G'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('H'.$row, $candidat->e_mail)
                        ->getStyle('H'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('I'.$row, $candidat->phone_number)
                        ->getStyle('I'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('J'.$row, $candidat->linkedin)
                        ->getStyle('J'.$row)
                        ->getAlignment()
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            //$worksheet->setCellValue('L'.$row, $candidat->activite->name);

                        //$worksheet->getRowDimension($row)->setRowHeight(-1);
            $row++;
        } 


        //Deuxieme section du tableau

        $worksheet->mergeCells('L1:AB1');
        $worksheet->setCellValue('N1', 'Participation in : Training/Internship/Event');
        $worksheet->getStyle('L1')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                    ->setStartColor(new Color('f4b084'));

        //allignement de mergecellule

        $worksheet->getStyle('L1')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        //sous section
        $worksheet->mergeCells('L2:O2');
        $worksheet->setCellValue('L2', 'To be specified if Training');
        $worksheet->getStyle('L2')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                    ->setStartColor(new Color('c6e0b4'));

        $worksheet->getStyle('L2')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $worksheet->setCellValue('L3', 'Place')
                    ->getStyle('L3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('M3', 'Training Date')
                    ->getStyle('M3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('N3', 'Training Duration')
                    ->getStyle('N3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('O3', 'Name of Training Conducted')
                    ->getStyle('O3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);

    // remplissage des données 
        //.....


          //3ème section du tableau

        $worksheet->mergeCells('Q2:V2');
        $worksheet->setCellValue('Q2', 'To be specified if internship');
        $worksheet->getStyle('Q2')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                    ->setStartColor(new Color('bdd7ee'));
  
        $worksheet->getStyle('Q2')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $worksheet->setCellValue('Q3', 'Place')
                    ->getStyle('Q3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('R3', 'Internship Start date')
                    ->getStyle('R3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('S3', 'Internship end date')
                    ->getStyle('S3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('T3', 'Internship duration (number of days')
                    ->getStyle('T3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('U3', 'Intership Name')
                    ->getStyle('U3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('V3', 'Project/Solutions developed')
                    ->getStyle('V3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);

        //remplissage des données





        //4ème section du tableau
        $worksheet->mergeCells('X2:AA2');
        $worksheet->setCellValue('X2', 'To be specified if Event');
        $worksheet->getStyle('X2')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                    ->setStartColor(new Color('ffd5f7'));
        
        $worksheet->getStyle('X2')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        
        $worksheet->setCellValue('X3', 'Place')
                    ->getStyle('X3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('Y3', 'Event date')
                    ->getStyle('Y3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('Z3', 'Event duration(number od days)')
                    ->getStyle('Z3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('AA3', 'Name of the Event')
                    ->getStyle('AA3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);

        //remplissage des donnes



        //5ème section du tableau

        $worksheet->mergeCells('AC1:AE1');
        $worksheet->setCellValue('AC1', 'Jobs Created');
        $worksheet->getStyle('AC1')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                    ->setStartColor(new Color('a9d08e'));

        $worksheet->getStyle('AC1')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Élargir la largeur des colonnes de AE1 à AG1
        $startColumn = 'AC';
        $endColumn = 'AE';
        $columnWidth = 15; // Définissez la largeur souhaitée en points
        for ($column = $startColumn; $column <= $endColumn; $column++) {
            $worksheet->getColumnDimension($column)->setWidth($columnWidth);
        }
        

        $worksheet->mergeCells('AC2:AE2');
        $worksheet->setCellValue('AC2', 'Employement of beneficiaires after ODC');
        $worksheet->getStyle('AC2')
                    ->getFill()
                    ->setFillType(FILL::FILL_SOLID)
                                ->setStartColor(new Color('ddebf7'));

        $worksheet->getStyle('AC2')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $worksheet->setCellValue('AC3', 'Company Name')
                    ->getStyle('AC3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('AD3', 'Contract type')
                    ->getStyle('AD3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('AE3', 'Job Position')
                    ->getStyle('AE3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
        $worksheet->setCellValue('AF3', 'Comments')
                    ->getStyle('AF3')
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);


        /*foreach ($worksheet->getColumnIterator() as $column) {
            $worksheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $worksheet->getStyle('A1:K1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('0070C0');*/
        
  

        //on cree le fichier Excel
        $writer = new Xlsx($spreadsheet); 
        $fileName ='candidats.Xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName); 
        $writer->save($tempFile);

        //On renvoie le fichier Excel au navigateur

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
