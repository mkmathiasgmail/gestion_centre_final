<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Activite;
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

        $groupedByMonth = $activities->groupBy(function ($item) {
            return Carbon::parse($item->startDate)->format('Y-m');
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

        $sheet->fromArray(['Semaine', 'Lieu', 'Nom activité', 'Durée(jours)', 'Nobr d\'heure(hr)', 'Date de l\'activité', 'Nombre d\'inscription', 'Nombre de participants', 'Nombre des filles', 'Nombre de garçons', 'Vérification'], NULL, 'A2');
    }

    protected function populateData(Worksheet $sheet, $activitiesInMonth, $month)
    {
        $firstDayOfMonth = Carbon::parse($month . '-01');
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $weekStart = $firstDayOfMonth->copy()->startOfWeek();
        $weekEnd = $weekStart->copy()->endOfWeek();

        $startRow = 4;
        while ($weekStart->lessThanOrEqualTo($lastDayOfMonth)) {
            if ($weekStart->month != $firstDayOfMonth->month) {
                // Passer à la semaine suivante si le début de la semaine est dans le mois précédent
                $weekStart->addWeek();
                $weekEnd->addWeek();
                continue;
            }

            // Filtrer les activités pour cette semaine spécifique
            $weekActivities = $activitiesInMonth->filter(function ($item) use ($weekStart, $weekEnd) {
                $startDate = Carbon::parse($item->startDate);
                return $startDate->between($weekStart, $weekEnd);
            });

            // Assigner les activités sans location à "Inconnu"
            foreach ($weekActivities as $activity) {
                if (is_null($activity->location) || $activity->location === '') {
                    $activity->location = 'Inconnu';
                }
            }

            // Initialisation du regroupement par location
            $groupedByLocation = $weekActivities->groupBy('location');

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
                foreach ($groupedByLocation as $location => $activities) {
                    $locationStartRow = $startRow; // Sauvegarder la position de départ de la location
                    $sheet->mergeCells('B' . $startRow . ':B' . ($startRow + $activities->count()));
                    $sheet->setCellValue('B' . $startRow, $location);

                    $data = [];
                    foreach ($activities as $item) {
                        $differenceDay = $item->startDate && $item->endDate ? Carbon::parse($item->startDate)->diffInDays(Carbon::parse($item->endDate)) + 1 : 1;
                        $data[] = [
                            $item->title,
                            $differenceDay > 1 ? $differenceDay . " jours" : $differenceDay . " jour",
                            null,
                            $item->startDate != $item->endDate ? Carbon::parse($item->startDate)->translatedFormat("d M") . " - " . Carbon::parse($item->endDate)->translatedFormat("d M") : Carbon::parse($item->startDate)->translatedFormat("d M"),
                            $item->cand_count != 0 ? $item->cand_count : null,
                            null,
                            $item->cand_count != 0 ? $item->female_count : null,
                            $item->cand_count != 0 ? $item->male_count : null,
                            null,
                        ];
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
        $sheet->fromArray(["Somme"], NULL, 'A' . ($startRow + 1));

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