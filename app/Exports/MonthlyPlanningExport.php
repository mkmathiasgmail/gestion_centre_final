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
use PhpOffice\PhpSpreadsheet\RichText\RichText;
class MonthlyPlanningExport
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
        
        $months = $this->data->groupBy(function ($item) {
            return Carbon::parse($item->date_debut)->format("F");
        });

        $years = $this->data->groupBy(function ($item) {
            return Carbon::parse($item->date_debut)->format("Y");
        });

        $month = $months->keys()->first();
        $year = $years->keys()->first();

        $sheet = new Worksheet($spreadsheet, $month);
        $spreadsheet->addSheet($sheet);

        $this->setHeader($sheet, $month, $year);
        $this->populateData($sheet, $month, $year);

        // Apply auto size to columns
        $this->autoSizeColumns($sheet);

        $dateTime = Carbon::now()->format("Y-m-d_H-i-s");
        $fileName = "monthly_planning_data_" . $dateTime . ".xlsx";

        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path("app/public/{$fileName}"));

        return $fileName;
    }

    protected function setHeader(Worksheet $sheet, $month, $year)
    {
        $sheet->insertNewRowBefore(1, 1);
        $sheet->insertNewRowBefore(2, 2);
        $sheet->mergeCells('A2:I2');

        $richText = new RichText();
        $part1 = $richText->createTextRun("Planning des activités Academy Digital ");
        $part1->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color("ff000000"))->setSize(18);
        $part2 = $richText->createTextRun(": " . $month . " " . $year);
        $part2->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color("ffffaa40"))->setSize(18);
        $sheet->getCell("A2")->setValue($richText);

        $sheet->insertNewRowBefore(6, 6);
        $sheet->mergeCells('A6:I6');
        $sheet->setCellValue("A6", $month);

        $sheet->getStyle("A2")->applyFromArray([
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
            ]
        ]);

        $sheet->getStyle("A6")->applyFromArray([
            "font" => [
                "size" => 18
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
            ],
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ff4040ff"
                ]
            ]
        ]);

        $sheet->getStyle("A4:I4")->applyFromArray([
            "font" => [
                "bold" => true,
            ],
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ffffaa40"
                ]
            ]
        ]);

        $sheet->getStyle("A5:I5")->applyFromArray([
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ff000000"
                ]
            ]
        ]);

        $sheet->fromArray(['Activité', 'Période', 'Durée', 'Cible', 'Nombre', 'Lieu', 'Intervenant', 'Thème de l\'activité', 'Observateur'], NULL, 'A4');
    }

    protected function populateData(Worksheet $sheet, $month, $year)
    {
        $monthFormat = Carbon::parse($month)->format("m");
        $activities = Activite::select("title", "lieu", "date_debut", "date_fin")
            ->whereMonth("date_debut", $monthFormat)
            ->whereYear("date_debut", $year)
            ->get();

        $data = [];
        $data[] = ["title" => "", "periode" => "", "duree" => "", "cible" => "", "nombre" => "", "lieu" => "", "intervenant" => "", "theme" => "", "observateur" => ""];

        foreach ($activities as $item) {
            $differenceDay = $item->date_debut && $item->date_fin ? Carbon::parse($item->date_debut)->diffInDays(Carbon::parse($item->date_fin)) : 1;
            $data[] = [
                "title" => $item->title,
                "periode" => $item->date_fin ? Carbon::parse($item->date_debut)->translatedFormat("d-M") . " - " . Carbon::parse($item->date_fin)->translatedFormat("d-M") : Carbon::parse($item->date_debut)->translatedFormat("d-M"),
                "duree" => $differenceDay > 1 ? $differenceDay . " jours" : $differenceDay . " jour",
                "cible" => null,
                "nombre" => null,
                "lieu" => $item->lieu,
                "intervenant" => null,
                "theme" => null,
                "observateur" => null,
            ];
        }

        $sheet->fromArray($data, NULL, 'A6');

        $cellRange = "A4:I" . ($sheet->getHighestRow());
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
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}