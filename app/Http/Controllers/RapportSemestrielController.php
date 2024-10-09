<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class RapportSemestrielController extends Controller
{
    public function exportToExcel(Request $request)
    {

        //recuprer les valeurs selectionnée dans le select du rapport semestrielle
        $selectYear = $request->input('yearselec');
        $selectSemestre = $request->input('semestre');




        // on calclue  les dates de début et de fin du semestre
        if ($selectSemestre == '1') {
            $startDate = date('Y-m-d', strtotime($selectYear . '-01-01'));
            $endDate = date('Y-m-d', strtotime($selectYear . '-06-30'));
        } else {
            $startDate = date('Y-m-d', strtotime($selectYear . '-07-01'));
            $endDate = date('Y-m-d', strtotime($selectYear . '-12-31'));
        }




        //DB::enableQueryLog();

        //On recuper les données depuis le model
        $activites = Activite::all();
        $candidats = Presence::leftJoin('candidats as ca', 'ca.id', '=', 'presences.candidat_id')
            ->leftJoin('odcusers as us', 'us.id', '=', 'ca.odcuser_id')
            ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
            ->leftJoin('categories  as cat', 'cat.id', '=', 'ac.categorie_id')
            ->leftJoin('activite_type_event as acty', 'acty.activite_id', '=', 'ac.id')
            ->leftJoin('type_events as typ', 'typ.id', '=', 'acty.type_event_id')
            ->leftJoin('employabilites as empl', 'empl.odcuser_id', '=', 'us.id')
            ->leftJoin('type_contrats as typecont', 'typecont.id', '=', 'empl.type_contrat_id')
            // ->leftJoin('postes as pst', 'pst.employabilite_id', '=', 'empl.id')
            // ->leftJoin('entreprises as entrp', 'entrp.employabilite_id', '=', 'empl.id')
            // ->leftJoin('postes as pst', 'pst.employabilite_id', '=', 'empl.id')
            // ->leftJoin('entreprises as entrp', 'entrp.employabilite_id', '=', 'empl.id')
            ->whereNotNull('ac.title')
            ->whereBetween('ac.start_date', [$startDate, $endDate])
            ->orderBy('ac.start_date', 'asc')
            ->orderBy('ac.title', 'asc')
            ->select([
                'presences.candidat_id',
                'us.first_name',
                'us.last_name',
                'us.email',
                'us.gender',
                'us.birth_date',
                'us.linkedin',
                'ca.odcuser_id',
                'ac.end_date',
                'ac.title',
                'ac.number_day',
                'typecont.libelle as type_contrat',
                'empl.nomboite as entreprise',
                'empl.poste',
                DB::raw('(ac.start_date) as startYear'),
                'cat.name as namecat',
                'typ.title as titletype',
                'typ.code',
                'ca.id',

            ])->distinct()
            ->get();

        //$queries = DB::getQueryLog();
        //dd($queries);

        //on cree un nouveau classeur PhpSpreadsheet
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        //premiere section du tableau
        $worksheet->mergeCells('A1:J1');
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
        function applyColorToColumn(Worksheet $worksheet, int $startRow, string $columnLetter, string $color)
        {
            // Récupérer le numéro de la dernière ligne du tableur
            $lastRow = $worksheet->getHighestRow();

            // Créer un range pour la colonne spécifiée
            $range = $columnLetter . $startRow . ':' . $columnLetter . $lastRow;

            // Appliquer la couleur au range
            $worksheet->getStyle($range)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB($color);
        }

        // --------------------- definitions des bordures du tableaux
        $worksheet->getStyle('A1:J3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('L1:O3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('Q1:V3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('X1:AA3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('AC1:AE3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('AF3:AF3500')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        //-------------------------ajoute des filtres pour chaque lignes 

        // Récupérer la feuille de travail
        $worksheet = $spreadsheet->getActiveSheet();

        // Définir les options du menu déroulant
        $options = ['H', 'F'];

        // Créer le menu déroulant dans la cellule 'C1'
        $cell = $worksheet->getCell('C4');
        $validation = $cell->getDataValidation();
        $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)
            ->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP)
            ->setAllowBlank(false)
            ->setFormula1('"' . implode(',', $options) . '"');

        // Copier le menu déroulant à toute la colonne 'C'
        for ($row = 5; $row <= $worksheet->getHighestRow(); $row++) {
            $worksheet->getCell('C' . $row)
                ->getDataValidation()
                ->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)
                ->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP)
                ->setAllowBlank(false)
                ->setFormula1('"' . implode(',', $options) . '"');
        }


        $worksheet->setSelectedCell('C1');



        //Colonne a colorer
        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'C', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'D', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'E', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'L', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'M', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'Q', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'X', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'Y', 'fff2cc');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 4, 'AD', 'fff2cc');


        //colonne separateur de section

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 1, 'K', 'aeaaaa');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 1, 'P', 'aeaaaa');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 1, 'W', 'aeaaaa');

        $worksheet = $spreadsheet->getActiveSheet();
        applyColorToColumn($worksheet, 1, 'AB', 'aeaaaa');


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

        //Deuxieme section du tableau

        $worksheet->mergeCells('L1:AB1');
        $worksheet->setCellValue('L1', 'Participation in : Training / Internship / Event ');
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



        //Code formule pour avoir le nombre de jours de durée d'une activité

        // Récupérer la feuille de travail
        $worksheet = $spreadsheet->getActiveSheet();

        // // Parcourir les lignes
        // for ($row = 1; $row <= $worksheet->getHighestRow(); $row++) {
        //     // Récupérer les valeurs des cellules R et S
        //     $dateStart = $worksheet->getCell('R' . $row)->getValue();
        //     $dateEnd = $worksheet->getCell('S' . $row)->getValue();

        //     // Vérifier si les cellules contiennent des dates valides
        //     if ($dateStart && $dateEnd) {
        //         // Créer des objets DateTime à partir des valeurs des cellules
        //         $dateStartObj = new \DateTime($dateStart);
        //         $dateEndObj = new \DateTime($dateEnd);

        //         // Calculer le nombre de jours entre les deux dates
        //         $interval = $dateStartObj->diff($dateEndObj);
        //         $days = $interval->days;

        //         // Écrire le résultat dans la cellule correspondante de la colonne T
        //         $worksheet->getCell('T' . $row)->setValue($days+1);
        //     } else {
        //         // Si les cellules ne contiennent pas de dates valides, laisser la cellule vide
        //         $worksheet->getCell('T' . $row)->setValue('');
        //     }
        // }


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


        //Remplissage de données du rapport semestriel selon les choix selectionné dans le select
        $row = 4;
        $typeform = env('TYPE_FORMATION');
        $typeform = explode(',', $typeform);

        $typeconf = env('TYPE_CONFERENCE');
        $typeconf = explode(',', $typeconf);

        $typeparc = env('TYPE_PARCOURS');
        $typeparc = explode(',', $typeparc);

        //fixation des colonnes lors du deliments de la feuilles
        $worksheet->freezePane('A4');
        $worksheet->freezePane('E4');

        foreach ($candidats as $candidat) {
            ini_set('max_execution_time', 10000);

            //recuperation et filtrage des numeros de telephone
            $phoneNumberResult = DB::table('candidat_attributes')
                ->whereRaw('LENGTH(CAST(RIGHT(value, 9) AS SIGNED)) = 9')
                ->select(DB::raw('CAST(RIGHT(value, 9) AS SIGNED) AS phone_number'))
                ->where('candidat_id', $candidat->id)
                ->first();

            if ($phoneNumberResult) {
                $phoneNumber = $phoneNumberResult->phone_number;
            } else {
                $phoneNumber = '';
            }
            //fin recuperation et filtrage des numeros de telephone

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
                $universiteValue ='';
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
            }else{
                $universiteValue = '';
            }


            //Recuperation des profession et specialités des 
            $profess = ['Profession'];

            $professLabelAttribute = DB::table('candidat_attributes')
            ->where(function ($query) use ($profess) {
                foreach ($profess as $value) {
                    $query->orWhere('label', 'LIKE BINARY', "%{$value}%");
                }
            })
            ->where('candidat_id', $candidat->id)
            ->first();

            // Initialisation de la variable
            $professionValue = ''; 

            if ($professLabelAttribute) {
                $professionValue = $professLabelAttribute->value;
            } elseif ($professionValue === null) { // Vérifie si la variable est nulle
                $profSpeciality = Odcuser::where('id', $candidat->odcuser_id)->get();
                if (request()->expectsJson()) {
                    return response()->json($profSpeciality);
                }
                foreach ($profSpeciality as $key => $odcuser) {
                    $profession = json_decode($odcuser->profession, true);
                    $professionValue = $profession['translations']['fr']['profession'] ?? '';
                }
            } else {
                $professionValue = ''; // Option par défaut si aucune condition n'est remplie
            }
            //recuperation des speciality
            $special = ['Spécialité ou domaine (étude ou profession)', 'Spécialité ou domaine'];
            $specialLabelAttribute = DB::table('candidat_attributes')
            ->where(function ($query) use ($special) {
                foreach ($special as $value) {
                    $query->orWhere('label', 'LIKE', "%{$value}%");
                }
            })
            ->where('candidat_id', $candidat->id)
            ->first();

            $specialiteValue = '';

            if ($specialLabelAttribute) {
                $specialiteValue = $specialLabelAttribute->value; // Correction ici
            } elseif ($specialiteValue === null) { // Utilisation de === pour la comparaison
                $speciality = Odcuser::where('id', $candidat->odcuser_id)->get();
                if (request()->expectsJson()) {
                    return response()->json($speciality);
                }
                foreach ($speciality as $key => $odcuser) {
                    $detail_profession = json_decode($odcuser->detail_profession, true);
                    $specialiteValue = $detail_profession['speciality'] ?? '';
                }
            } else {
                $specialiteValue = ''; // Option par défaut si aucune condition n'est remplie
            }
            //calcule d'age du candidats
            $today = new DateTime(); // Date d'aujourd'hui
            $birthDay = new DateTime($candidat->birth_date); // Date de naissance du candidat
            $interval = $today->diff($birthDay);
            $ages = $interval->y; // Âge en années

            //verification des ages des participants
            $tranche = "";
            // if ($ages >= 3 && $ages <= 14) {
            //     $tranche = "0 - 14 years";
            // }
            if ($ages >= 15 && $ages <= 24) {
                $tranche = "15 - 24 years";
            } elseif ($ages >= 25 && $ages <= 34) {
                $tranche = "25 - 34 years";
            } elseif ($ages >= 35) {
                $tranche = "35 > years";
            }
            //verification des sexes 
            
            $gender= $candidat->gender;

            if ($gender == 'M') 
            {
                $gender = "male";
            }elseif($gender =='F')
            {
                $gender = "female";
            }

            $worksheet->setCellValue('A' . $row, $candidat->first_name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('B' . $row, $candidat->last_name)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('C' . $row, $gender)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('D' . $row, $tranche)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('E' . $row, $professionValue)
                ->getStyle('E' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('F' . $row, $universiteValue)
                ->getStyle('F' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('G' . $row, $specialiteValue)
                ->getStyle('G' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $worksheet->setCellValue('H' . $row, $candidat->email)
                ->getStyle('H' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
            $worksheet->setCellValue('I' . $row, $phoneNumber)
                ->getStyle('I' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('J' . $row, $candidat->linkedin)
                ->getStyle('J' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            if (in_array($candidat->code, $typeform)) {
                $worksheet->setCellValue('Q' . $row, $candidat->namecat)
                    ->getStyle('Q' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('R' . $row, $candidat->startYear)
                    ->getStyle('R' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('S' . $row, $candidat->end_date)
                    ->getStyle('S' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('T' . $row, $candidat->number_day)
                    ->getStyle('T' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('U' . $row, $candidat->title)
                    ->getStyle('U' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            } elseif (in_array($candidat->code, $typeparc)) {
                $worksheet->setCellValue('L' . $row, $candidat->namecat)
                    ->getStyle('L' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('M' . $row, $candidat->startYear)
                    ->getStyle('M' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('M' . $row, $candidat->startYear)
                    ->getStyle('M' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('N' . $row, $candidat->number_day)
                    ->getStyle('N' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            } elseif (in_array($candidat->code, $typeconf)) {
                $worksheet->setCellValue('X' . $row, $candidat->namecat)
                    ->getStyle('X' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('Y' . $row, $candidat->startYear)
                    ->getStyle('Y' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('Z' . $row, $candidat->number_day)
                    ->getStyle('Z' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $worksheet->setCellValue('AA' . $row, $candidat->title)
                    ->getStyle('AA' . $row)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
            $worksheet->setCellValue('AC' . $row, $candidat->entreprise)
                ->getStyle('AC' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('AD' . $row, $candidat->type_contrat)
                ->getStyle('AD' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $worksheet->setCellValue('AE' . $row, $candidat->poste)
                ->getStyle('AD' . $row)
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $row++;
        }


        


        //on cree le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Rapport_du_Semestre_{$selectSemestre}_{$selectYear}.Xlsx";
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
