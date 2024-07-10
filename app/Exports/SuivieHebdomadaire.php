<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Activite;
use App\Models\Candidat;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SuivieHebdomadaire
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->removeSheetByIndex(0); // Remove default sheet

        $activities = $this->data;;

        $sortedByMonth = $activities->sortBy(function ($item) {
            return Carbon::parse($item->start_date);
        });

        $groupedByMonth = $sortedByMonth->groupBy(function ($item) {
            return Carbon::parse($item->start_date)->format('Y-m');
        });

        foreach ($groupedByMonth as $month => $activitiesInMonth) {
            $sheet = new Worksheet($spreadsheet, Carbon::parse($month)->format('F Y'));
            $spreadsheet->addSheet($sheet);

            $this->setHeader($sheet, Carbon::parse($month)->format('F'), Carbon::parse($month)->format('Y'));
            $this->populateData($sheet, $activitiesInMonth, $month);
        }

        // Apply auto size to columns
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            $this->autoSizeColumns($sheet);
        }

        $dateTime = Carbon::now()->format("Y-m-d_H-i-s");
        $fileName = "suivie_hebdomadiare_data_" . $dateTime . ".xlsx";

        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path("app/public/{$fileName}"));

        return $fileName;
    }

    protected function setHeader(Worksheet $sheet, $month, $year)
    {
        $sheet->insertNewRowBefore(1, 1);
        $sheet->mergeCells('A1:C1');

        $sheet->getStyle("A2:K2")->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 10
            ],
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ffcccccc"
                ]
            ]
        ]);

        $sheet->getStyle("A")->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 11            
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
                ],
        ]);

        $sheet->getStyle("B")->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 11            
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
                ],
        ]);

        $sheet->fromArray(['Semaine', 'Categorie', 'Nom activité', 'Durée(jours)', 'Nobr d\'heure(hr)', 'Date de l\'activité', 'Nombre d\'inscription', 'Nombre de participants', 'Nombre des filles', 'Nombre de garçons', 'Vérification'], NULL, 'A2');
    }

    protected function populateData(Worksheet $sheet, $activitiesInMonth, $month)
    {
        $firstDayOfMonth = Carbon::parse($month . '-01');
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $weekStart = $firstDayOfMonth->copy()->startOfWeek();
        $weekEnd = $weekStart->copy()->endOfWeek();

        $startRow = 4;
        $totalTitle = 0;
        $totalDay = 0;
        $totalHours = 0;
        $totalInscris = 0;
        $totalPart = 0;
        $totalFille = 0;
        $totalGarc = 0;

        while ($weekStart->lessThanOrEqualTo($lastDayOfMonth)) {
            if ($weekStart->month != $firstDayOfMonth->month) {
                // Passer à la semaine suivante si le début de la semaine est dans le mois précédent
                $weekStart->addWeek();
                $weekEnd->addWeek();
                continue;
            }

            // Filtrer les activités pour cette semaine spécifique
            $weekActivities = $activitiesInMonth->filter(function ($item) use ($weekStart, $weekEnd) {
                $start_date = Carbon::parse($item->start_date);
                return $start_date->between($weekStart, $weekEnd);
            });

            // Assigner les activités sans location à "Inconnu"
            // foreach ($weekActivities as $activity) {
            //     if (is_null($activity->location) || $activity->location === '') {
            //         $activity->location = 'Aucune information';
            //     }
            // }

            // Initialisation du regroupement par location
            $groupedByCategorie = $weekActivities->groupBy('name');

            $cellNbr = $startRow + $weekActivities->count();

            if ($weekActivities->isEmpty()) {
                $sheet->mergeCells('A'. $startRow .':A'. $cellNbr + 1 .'');
                $sheet->setCellValue('A' . $startRow, $weekStart->format('d-M'));
                $startRow += 3; // Leave a space between weeks
                $sheet->getStyle('A'. $startRow - 1 .':K'. $startRow - 1)->applyFromArray([
                    "fill" => [
                        "fillType" => Fill::FILL_SOLID,
                        "startColor" => [
                            "argb" => "ff000000"
                        ]
                    ]
                ]);

            } else {
                $initialStartRow = $startRow; // Sauvegarder la position de départ de la semaine
                foreach ($groupedByCategorie as $categorie => $activities) {
                    $locationStartRow = $startRow; // Sauvegarder la position de départ de la location
                    $sheet->mergeCells('B' . $startRow . ':B' . ($startRow + $activities->count()));
                    $sheet->setCellValue('B' . $startRow, $categorie);

                    $data = [];
                    foreach ($activities as $item) {
                        $differenceDay = $item->start_date && $item->end_date ? Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1 : 1;
                        $data[] = [
                            $item->title,
                            $differenceDay > 1 ? $differenceDay . " jours" : $differenceDay . " jour",
                            $item->number_hour ?? null,
                            $item->start_date != $item->end_date ? Carbon::parse($item->start_date)->translatedFormat("d M") . " - " . Carbon::parse($item->end_date)->translatedFormat("d M") : Carbon::parse($item->start_date)->translatedFormat("d M"),
                            $item->cand_count != 0 ? $item->cand_count : null,
                            $item->cand_count != 0 && $item->pre_count != 0 ? $item->pre_count : null,
                            $item->cand_count != 0 ? $item->female_count : null,
                            $item->cand_count != 0 ? $item->male_count : null,
                            null,
                        ];

                        $totalTitle ++;
                        $totalDay += $differenceDay;
                        $totalHours += $item->number_hour != 0 ? $item->number_hour : 0;
                        $totalInscris += $item->cand_count != 0 ? $item->cand_count : 0;
                        $totalPart += $item->pre_count != 0 ? $item->pre_count : 0;
                        $totalFille += $item->female_count != 0 ? $item->female_count : 0;
                        $totalGarc += $item->male_count != 0 ? $item->male_count : 0;
                    }

                    $sheet->fromArray($data, NULL, 'C' . $startRow);
                    $startRow += count($data) + 1;
                }

                // Fusionner les cellules pour la date de la semaine
                $sheet->mergeCells('A' . $initialStartRow . ':A' . ($startRow - 1));
                $sheet->setCellValue('A' . $initialStartRow, $weekStart->format('d F'));
                $startRow += 1;
                        
            }

            $sheet->getStyle('A'. $startRow - 1 .':K'. $startRow - 1)->applyFromArray([
                "fill" => [
                    "fillType" => Fill::FILL_SOLID,
                    "startColor" => [
                        "argb" => "ff000000"
                    ]
                ]
            ]);

            $weekStart->addWeek();
            $weekEnd->addWeek();
        }

        $sheet->mergeCells('A' . ($startRow + 1) . ':B' . ($startRow + 1));
        $sheet->fromArray(['Somme mensuelle', null, (string)$totalTitle, (string)$totalDay, (string)$totalHours, null, (string)$totalInscris, (string)$totalPart, (string)$totalFille, (string)$totalGarc, null], NULL, 'A' . ($startRow + 1));

        $cellRange = "A2:K" . ($sheet->getHighestRow());
        $sheet->getStyle($cellRange)->applyFromArray([
            "borders" => [
                "allBorders" => [
                    "borderStyle" => Border::BORDER_THIN,
                    "color" => ["argb" => "ff000000"]
                ]
            ]
        ]);
    }

    protected function autoSizeColumns(Worksheet $sheet)
    {
        foreach (range('A', 'K') as $columnID) {
            if ($columnID === 'B' || $columnID === 'C') {
                $sheet->getColumnDimension('B')->setWidth(25);
                $sheet->getStyle('B')->getAlignment()->setWrapText(true);
                $sheet->getColumnDimension('C')->setWidth(50);
                $sheet->getStyle('C')->getAlignment()->setWrapText(true);
            }
            else {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        }
        
    }
}