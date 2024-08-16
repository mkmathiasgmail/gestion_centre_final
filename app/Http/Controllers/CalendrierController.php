<?php

namespace App\Http\Controllers;


use PhpOffice\PhpSpreadsheet\Style\Font;
use DateTime;
use App\Models\Activite;
use App\Models\Presence;
use App\Models\Calendrier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CalendrierController extends Controller
{
    public function export()
    {

        $categorieId = 2;
        $categorId = 1;
        $categorieActivites = Activite::where('categorie_id', $categorieId)->get();
        $categorActivites = Activite::where('categorie_id', $categorId)->get();
        $mergedActivites = Activite::whereIn('categorie_id', [$categorieId, $categorId])
            ->orderBy('start_date', 'asc')
            ->get();


        $candidats = Presence::leftJoin('candidats as ca', 'ca.id', '=', 'presences.candidat_id')
            ->leftJoin('odcusers as us', 'us.id', '=', 'ca.odcuser_id')
            ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
            ->leftJoin('categories  as cat', 'cat.id', '=', 'ac.categorie_id')
            ->whereNotNull('ac.title')
            ->orderBy('ac.start_date', 'asc')
            ->select([
                'presences.candidat_id',
                'us.gender',
                'ac.end_date',
                'ac.title',
                'ac.start_date',
                'cat.name'
            ])
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('B1', 'STAGES');
        $sheet->setCellValue('B2', 'Stage Orange Summer Challenge');
        $sheet->setCellValue('B3', 'Stage en Reconversion Profesionnelle');
        $sheet->setCellValue('B4', "Stage PFE (Projet de Fin d'Etudes)");
        $sheet->setCellValue('B5', "AWS re/Start");
        $sheet->setCellValue('F1', 'FABLAB SOLIDAIRE');
        $sheet->setCellValue('F2', 'OpenLab');
        $sheet->setCellValue('F3', "Atelier RoboKID (Ecole Numérique))");
        $sheet->setCellValue('F4', "Workshop FabLab");
        $sheet->setCellValue('I1', 'CIBLE : EXTERNE ODC (GRAND PUBLIC)');
        $sheet->setCellValue('I2', "Formations en ligne/ODC/Univérsités");
        $sheet->setCellValue('I3', "ODC talks");
        $sheet->setCellValue('I4', "Evénement");
        $sheet->setCellValue('I5', "SuperCodeurs");

        // --------------------------------------------------------------------//
        function applyCellStyle($sheet, $cell, $fontSize)
        {
            $sheet->getStyle($cell)
                ->getFont()
                ->setBold(true)
                ->setColor(new Color(Color::COLOR_BLACK))
                ->setName('Arial')
                ->setSize($fontSize);

            $sheet->getStyle($cell)
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('cccccc');

            $sheet->getStyle($cell)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->getStyle($cell)
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));
        }


        $sheet->setCellValue('D7', "Nom activité");
        $sheet->setCellValue('E7', "Durée de la \nformation \n(jours)");
        $sheet->setCellValue('F7', "Nbre \nd'heures (hr)");
        $sheet->setCellValue('G7', "Cible (Grand \npublic / nom\n université)");
        $sheet->setCellValue('H7', "Nombre\n d'inscriptions");
        $sheet->setCellValue('I7', "Nombre de\n participants");
        $sheet->setCellValue('J7', "Nombre de\n filles");
        $sheet->setCellValue('K7', "Nombre de\n garçons");
        $sheet->setCellValue('L7', "Emplois\n créés");
        $sheet->setCellValue('M7', "Startups\n accompagné\nes");

        applyCellStyle($sheet, 'A7', 18);
        applyCellStyle($sheet, 'D7', 9);
        applyCellStyle($sheet, 'E7', 9);
        applyCellStyle($sheet, 'F7', 9);
        applyCellStyle($sheet, 'G7', 9);
        applyCellStyle($sheet, 'H7', 9);
        applyCellStyle($sheet, 'I7', 9);
        applyCellStyle($sheet, 'J7', 9);
        applyCellStyle($sheet, 'K7', 9);
        applyCellStyle($sheet, 'L7', 9);
        applyCellStyle($sheet, 'M7', 9);

        // Activer l'habillage de texte pour les cellules avec des retours à la ligne
        $columns = ['E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];
        foreach ($columns as $column) {
            $sheet->getStyle($column . '7')->getAlignment()->setWrapText(true);
        }

        // Ajuster la largeur des colonnes Fablab
        $sheet->mergeCells('F1:G1')->getColumnDimension('G')->setWidth(20);
        $sheet->mergeCells('F2:G2')->getColumnDimension('F')->setWidth(15);
        $sheet->mergeCells('F3:G3');
        $sheet->mergeCells('F4:G4');
        function setCalendarColumnWidths($sheet, $months, $startRow, $calendarColumnWidth)
        {
            foreach ($months as $index => $month) {
                $startColumnIndex = $index * 12 + 1;

                // Définir les largeurs de colonnes pour les colonnes du calendrier
                for ($colIndex = $startColumnIndex; $colIndex < $startColumnIndex + 10; $colIndex++) {
                    $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex);
                    $sheet->getColumnDimension($columnLetter)->setWidth($calendarColumnWidth);
                }
            }
        }


        $months = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre'
        ];


        $daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

        $startRow = 60; // Starting row
        $calendarColumnWidth = 15; // Width for calendar columns

        setCalendarColumnWidths($sheet, $months, $startRow, $calendarColumnWidth);


        $sheet = $spreadsheet->getActiveSheet();
        $startRow = 60;
        $currentYear = date('Y');


        foreach ($months as $index => $month) {
            $startColumnIndex = $index * 12 + 1;
            $currentColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex);
            $date = new DateTime("{$currentYear}-" . ($index + 1) . "-01");
            $daysInMonth = $date->format('t');
            $lastDayRow = $startRow + 1 + $daysInMonth;

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date->setDate($currentYear, $index + 1, $day);
                $formattedDate = $date->format('Y-m-d');
                $dayOfWeek = $daysOfWeek[$date->format('w')];
                $dateColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex);
                $dayColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1);

                // Définir le jour et le jour de la semaine
                $sheet->setCellValue("{$dateColumn}" . ($day + $startRow + 1), $day);
                $sheet->setCellValue("{$dayColumn}" . ($day + $startRow + 1), $dayOfWeek);

                // Rechercher les activités qui commencent ce jour-là
                $filteredActivities = $mergedActivites->filter(function ($activity) use ($formattedDate) {
                    return $activity->start_date == $formattedDate;
                });

                // Ajouter les activités aux colonnes appropriées
                foreach ($filteredActivities as $activity) {
                    // Calculer la durée de l'activité
                    $activityStartDate = new DateTime($activity->start_date);
                    $activityEndDate = new DateTime($activity->end_date);
                    $duration = $activityEndDate->diff($activityStartDate)->days + 1; // Durée de l'activité en jours

                    if ($activity->categorie_id == 2) {
                        $activityColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 2);
                    } elseif ($activity->categorie_id == 1) {
                        $activityColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 4);
                    }

                    // Déterminer les coordonnées de début et, si nécessaire, de fin pour la fusion des cellules
                    $startCellCoordinate = "{$activityColumn}" . ($day + $startRow + 1);

                    if ($duration <= 3) {
                        $endCellRow = $day + $startRow + $duration - 1;
                        $endCellCoordinate = "{$activityColumn}{$endCellRow}";

                        // Fusionner les cellules pour les événements de 3 jours ou moins
                        $sheet->mergeCells("{$startCellCoordinate}:{$endCellCoordinate}");
                    } else {
                        $endCellCoordinate = $startCellCoordinate; // Pas de fusion pour les événements de plus de 3 jours
                    }

                    // Placer l'activité dans la cellule (fusionnée ou non)
                    $sheet->setCellValue($startCellCoordinate, $activity->title);

                    // Centrer le texte verticalement et horizontalement
                    $sheet->getStyle($startCellCoordinate)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle($startCellCoordinate)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $sheet->getStyle($startCellCoordinate)->getAlignment()->setWrapText(true);

                    // Ajouter la couleur de fond et la couleur du texte
                    if ($activity->categorie_id == 2) {
                        $sheet->getStyle($startCellCoordinate)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('ffb400');
                    } elseif ($activity->categorie_id == 1) {
                        $sheet->getStyle($startCellCoordinate)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('efb88f');
                    }
                    $sheet->getStyle($startCellCoordinate)->getFont()->getColor()->setARGB('FFFFFFFF');
                }



                // Appliquer une mise en forme grasse aux dates et aux jours de la semaine
                $sheet->getStyle("{$dateColumn}" . ($day + $startRow + 1) . ":" . "{$dayColumn}" . ($day + $startRow + 1))
                    ->getFont()
                    ->setBold(true);
            }

            // Ajouter des bordures autour de la section du mois entier
            $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$lastDayRow}")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);

            for ($i = $startRow + 2; $i <= $lastDayRow; $i++) {
                $sheet->getStyle("{$currentColumn}" . $i)
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('ead1dc');
                $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . $i)
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('eeeeee');
            }


            // Fusionner et définir le titre du mois
            $sheet->mergeCells("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}");
            $sheet->setCellValue("{$currentColumn}{$startRow}", $month);
            $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FF000000');
            $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                ->getFont()
                ->getColor()
                ->setARGB('FFFFFFFF');
            $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER);


            // Définir des sous-titres
            $sheet->mergeCells("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1));
            $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 2) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 3) . ($startRow + 1));
            $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 4) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 5) . ($startRow + 1));
            $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 6) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 7) . ($startRow + 1));
            $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 8) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . ($startRow + 1));

            $sheet->setCellValue("{$currentColumn}" . ($startRow + 1), ' ');
            $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 2) . ($startRow + 1), 'Ecole du code');
            $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 4) . ($startRow + 1), 'Université/ODC Club');
            $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 6) . ($startRow + 1), 'FabLab');
            $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 8) . ($startRow + 1), 'Orange Fab');

            $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                ->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FF000000');
            $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                ->getFont()
                ->getColor()
                ->setARGB('FFFFFFFF');
            $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER);

            // Appliquer une mise en forme en gras aux en-têtes de section
            $styles = [1, 2, 4, 6, 8];
            foreach ($styles as $colIndex) {
                $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex + 1) . ($startRow + 1))
                    ->getFont()
                    ->setBold(true)
                    ->setName('Arial')
                    ->setSize(13)
                    ->getColor()
                    ->setARGB('FF000000');
                $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex + 1) . ($startRow + 1))
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);
            }

            // Définir les jours du mois avec un formatage en gras
            $date = new DateTime("{$currentYear}-" . ($index + 1) . "-01");
            $daysInMonth = $date->format('t');
            $lastDayRow = $startRow + 1 + $daysInMonth;

            foreach ($months as $index => $month) {
                $startColumnIndex = $index * 12 + 1; // 10 columns for each month plus 2 extra for spacing
                $currentColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex);

                // Fusionner et définir le titre du mois
                $sheet->mergeCells("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}");
                $sheet->setCellValue("{$currentColumn}{$startRow}", $month);
                $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF000000');
                $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                    ->getFont()
                    ->getColor()
                    ->setARGB('FFFFFFFF');
                $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$startRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // Définir des sous-titres
                $sheet->mergeCells("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1));
                $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 2) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 3) . ($startRow + 1));
                $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 4) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 5) . ($startRow + 1));
                $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 6) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 7) . ($startRow + 1));
                $sheet->mergeCells(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 8) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . ($startRow + 1));

                $sheet->setCellValue("{$currentColumn}" . ($startRow + 1), 'Date');
                $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 2) . ($startRow + 1), 'Ecole du code');
                $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 4) . ($startRow + 1), 'Université/ODC Club');
                $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 6) . ($startRow + 1), 'FabLab');
                $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 8) . ($startRow + 1), 'Orange Fab');

                $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF000000');
                $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                    ->getFont()
                    ->getColor()
                    ->setARGB('FFFFFFFF');
                $sheet->getStyle("{$currentColumn}" . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . ($startRow + 1))
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // Appliquer une mise en forme en gras aux en-têtes de sectio
                $styles = [2, 4, 6, 8];
                foreach ($styles as $colIndex) {
                    $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex + 1) . ($startRow + 1))
                        ->getFont()
                        ->setBold(true)
                        ->setName('Arial')
                        ->setSize(13)
                        ->getColor()
                        ->setARGB('FF000000');
                    $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex) . ($startRow + 1) . ":" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $colIndex + 1) . ($startRow + 1))
                        ->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                        ->setVertical(Alignment::VERTICAL_CENTER);
                }

                // Définir les jours du mois avec un formatage en gras
                $date = new DateTime("{$currentYear}-" . ($index + 1) . "-01");
                $daysInMonth = $date->format('t');
                $lastDayRow = $startRow + 1 + $daysInMonth;

                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $date->setDate($currentYear, $index + 1, $day);
                    $dayOfWeek = $daysOfWeek[$date->format('w')];
                    $dateColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex);
                    $dayColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1);
                    $sheet->setCellValue("{$dateColumn}" . ($day + $startRow + 1), $day); // seulement le jour
                    $sheet->setCellValue("{$dayColumn}" . ($day + $startRow + 1), $dayOfWeek);

                    // Appliquer une mise en forme grasse aux dates et aux jours de la semaine
                    $sheet->getStyle("{$dateColumn}" . ($day + $startRow + 1) . ":" . "{$dayColumn}" . ($day + $startRow + 1))
                        ->getFont()
                        ->setBold(true);
                }

                // Ajoutez des bordures uniquement autour de la section du mois entier
                $sheet->getStyle("{$currentColumn}{$startRow}:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 9) . "{$lastDayRow}")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN);

                for ($i = $startRow + 2; $i <= $lastDayRow; $i++) {
                    $sheet->getStyle("{$currentColumn}" . $i)
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('ead1dc');
                    $sheet->getStyle(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + 1) . $i)
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('eeeeee');
                }
            }
        }



        function fusionCell($sheet, $cellRange, $text, $backgroundColor, $textColor = null, $bold = true, $horizontalAlign = Alignment::HORIZONTAL_CENTER, $verticalAlign = Alignment::VERTICAL_CENTER)
        {
            $sheet->mergeCells($cellRange);
            $startCell = explode(':', $cellRange)[0];
            $sheet->setCellValue($startCell, $text);
            $sheet->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($backgroundColor);
            $sheet->getStyle($cellRange)->getAlignment()->setHorizontal($horizontalAlign)->setVertical($verticalAlign);
            if ($bold) {
                $sheet->getStyle($cellRange)->getFont()->setBold(true);
            }
            if ($textColor) {
                $sheet->getStyle($cellRange)->getFont()->getColor()->setARGB($textColor);
            }
            $sheet->getStyle($cellRange)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle($cellRange)->getBorders()->getRight()->setBorderStyle(Border::BORDER_THIN);
        }

        fusionCell($sheet, 'A8:C13', 'OpenLab (FabLab)', 'FF6D01');
        fusionCell($sheet, 'A14:C15', 'Atelier RoboKID (Ecole Numérique)', 'ff9a4f');
        fusionCell($sheet, 'A16:C17', 'Workshop FabLab', 'efb88f');
        fusionCell($sheet, 'A18:C38', 'Formations en ligne/ODC/Univérsités', 'ffb400');
        fusionCell($sheet, 'A18:C38', 'Formations en ligne/ODC/Univérsités', 'ffb400');
        fusionCell($sheet, 'A39:C39', '', '0a6e31');
        fusionCell($sheet, 'A40:C41', 'ODC talks', '0a6e31');
        fusionCell($sheet, 'A42:C49', 'Evènements', 'ff7900');
        fusionCell($sheet, 'A50:C52', 'SuperCodeurs', '085ebd');
        fusionCell($sheet, 'A53:C56', 'Stages', '000000', 'FFFFFF');

        // Définir les styles titre
        $sheet->getStyle('B1')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('000000');
        $sheet->getStyle('B1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B1:D1')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('B1')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ////
        $sheet->getStyle('B2')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('B2')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff00ff');
        $sheet->getStyle('B2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B2:D2')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('B2')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ////
        $sheet->getStyle('B3')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('B3')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c27ba0');
        $sheet->getStyle('B3')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B3:D3')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('B3')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////
        $sheet->getStyle('B4')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('B4')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('d5a6bd');
        $sheet->getStyle('B4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B4:D4')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('B4')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        /////
        $sheet->getStyle('B5')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('B5')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ead1dc');
        $sheet->getStyle('B5')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B5:D5')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('B5')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        $sheet->getStyle('F1')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('F1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('000000');
        $sheet->getStyle('F1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('F1:G1')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('F1')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////////////////////
        $sheet->getStyle('F2')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('F2')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff6d01');
        $sheet->getStyle('F2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('F2:G2')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('F2')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ////////////////////////
        $sheet->getStyle('F3')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('F3')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff9a4f');
        $sheet->getStyle('F3')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('F3:G3')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('F3')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        /////////////////
        $sheet->getStyle('F4')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('F4')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff9a4f');
        $sheet->getStyle('F4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('F4:G4')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('F4')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        // CIBLE : EXTERNE ODC (GRAND PUBLIC)
        $sheet->getStyle('I1')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('I1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff9a4f');
        $sheet->getStyle('I1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('I1:M1')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('I1')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////////
        $sheet->getStyle('I2')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('I2')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ffb400');
        $sheet->getStyle('I2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('I2:M2')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('I2')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////////
        $sheet->getStyle('I3')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('I3')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('0a6e31');
        $sheet->getStyle('I3')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('I3:M3')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('I3')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////////
        $sheet->getStyle('I4')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('I4')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('ff7900');
        $sheet->getStyle('I4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('I4:M4')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('I4')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);

        ///////////
        $sheet->getStyle('I5')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_WHITE));
        $sheet->getStyle('I5')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('085ebd');
        $sheet->getStyle('I5')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('I5:M5')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('I5')
            ->getFont()
            ->setName('Arial')
            ->setSize(9);
        ///////////////////////////////////////
        $sheet->getStyle('A7')
            ->getFont()
            ->setBold(true)
            ->setColor(new Color(Color::COLOR_BLACK));
        $sheet->getStyle('A7')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('cccccc');
        $sheet->getStyle('A7')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A7:C7')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));
        $sheet->getStyle('A7')
            ->getFont()
            ->setName('Arial')
            ->setSize(18);

        // Ajuster la largeur des colonnes contenant les titres
        $sheet->mergeCells('B1:D1')->getColumnDimension('B')->setWidth(20);
        $sheet->mergeCells('B2:D2')->getColumnDimension('C')->setWidth(20);
        $sheet->mergeCells('B3:D3')->getColumnDimension('D')->setWidth(20);
        $sheet->mergeCells('B4:D4');
        $sheet->mergeCells('B5:D5');

        for ($column = 'N'; $column <= 'U'; $column++) {
            $sheet->getColumnDimension($column)->setWidth(15);
        }

        for ($column = 'Y'; $column <= 'AF'; $column++) {
            $sheet->getColumnDimension($column)->setWidth(15);
        }

        $largCol = [];
        for ($column = 'B'; $column <= 'D'; $column++) {
            $largCol[$column] = $sheet->getColumnDimension($column)->getWidth();
        }

        // Réinitialiser la largeur de chaque colonne fusionnée
        for ($column = 'B'; $column <= 'D'; $column++) {
            $sheet->getColumnDimension($column)->setWidth($largCol[$column]);
        }

        // Ajuster la largeur des colonnes Fablab
        $sheet->mergeCells('F1:G1')->getColumnDimension('G')->setWidth(20);
        $sheet->mergeCells('F2:G2')->getColumnDimension('F')->setWidth(15);
        $sheet->mergeCells('F3:G3');
        $sheet->mergeCells('F4:G4');

        $hautCol = [];
        for ($column = 'F'; $column <= 'G'; $column++) {
            $hautCol[$column] = $sheet->getColumnDimension($column)->getWidth();
        }

        // Réinitialiser la largeur de chaque colonne fusionnée
        for ($column = 'F'; $column <= 'G'; $column++) {
            $sheet->getColumnDimension($column)->setWidth($hautCol[$column]);
        }

        // Ajuster la largeur des colonnes CIBLE : EXTERNE
        $sheet->mergeCells('I1:M1');
        $sheet->mergeCells('I2:M2');
        $sheet->mergeCells('I3:M3');
        $sheet->mergeCells('I4:M4');
        $sheet->mergeCells('I5:M5');
        $sheet->mergeCells('M8:M56');

        $bordure = [
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('M8:M56')->applyFromArray($bordure);

        // -------- Definir des bordures bas -------------// 
        $bordure = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $startColumn = 'D';
        $startRow = 8;
        $endColumn = 'L';
        $endRow = 56;

        // Parcourir chaque cellule dans la plage
        for ($row = $startRow; $row <= $endRow; $row++) {
            for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                $cell = chr($col) . $row;
                $sheet->getStyle($cell)->applyFromArray($bordure);
            }
        }

        // Definir des bordures gauches
        $bordure = [
            'borders' => [
                'left' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $startColumn = 'E';
        $startRow = 8;
        $endColumn = 'L';
        $endRow = 56;

        // Parcourir chaque cellule dans la plage
        for ($row = $startRow; $row <= $endRow; $row++) {
            for ($col = ord($startColumn); $col <= ord($endColumn); $col++) {
                $cell = chr($col) . $row;
                $sheet->getStyle($cell)->applyFromArray($bordure);
            }
        }

        //---- Definir la couleur des bordures--------------//

        $bordure = [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF000000'],
            ],
        ];

        $sheet->getStyle('D57:M57')->applyFromArray($bordure);
        //-----------------------------------------------------------//
        $largCol = [];
        for ($column = 'I'; $column <= 'M'; $column++) {
            $largCol[$column] = $sheet->getColumnDimension($column)->getWidth();
        }

        // Réinitialiser la largeur de chaque colonne fusionnée
        for ($column = 'I'; $column <= 'M'; $column++) {
            $sheet->getColumnDimension($column)->setWidth($largCol[$column]);
        }

        ///////////////////////a//////////////////////////
        $sheet->mergeCells('A7:C7')->getRowDimension(1)
            ->setRowHeight(30);;

        $writer = new Xlsx($spreadsheet);
        $spreadsheet->getSheetByName('Feuille 1');
        $fileName = 'calendrier.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
