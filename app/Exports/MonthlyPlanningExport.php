<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Activite;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

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
            return Carbon::parse($item->start_date)->format("F");
        });

        $years = $this->data->groupBy(function ($item) {
            return Carbon::parse($item->start_date)->format("Y");
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
        $sheet->mergeCells('A6:J6');
        $sheet->setCellValue("A6", $month);

        $sheet->getStyle("A")->applyFromArray([
            "font" => [
                "bold" => true
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
            ],            
        ]);

        $sheet->getStyle("A2")->applyFromArray([
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
            ]
        ]);

        $sheet->getStyle("A6")->applyFromArray([
            "font" => [
                "size" => 16
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
                "vertical" => Alignment::VERTICAL_CENTER,
            ],
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ff4472c4"
                ]
            ]
            
        ]);

        $sheet->getStyle("A4:J4")->applyFromArray([
            "font" => [
                "bold" => true,
            ],
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ffed7d31"
                ]
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_LEFT,
            ],

        ]);

        $sheet->getStyle("A5:J5")->applyFromArray([
            "fill" => [
                "fillType" => Fill::FILL_SOLID,
                "startColor" => [
                    "argb" => "ff000000"
                ]
            ]
        ]);

        $sheet->fromArray(['Categorie', 'Activité', 'Période', 'Durée', 'Cible', 'Nombre', 'Lieu', 'Intervenant', 'Thème de l\'activité', 'Observateur'], NULL, 'A4');
    }

    protected function populateData(Worksheet $sheet, $month, $year)
    {
        $monthFormat = Carbon::parse($month)->format("m");
        $activities = DB::table('activites')
            ->leftjoin('activite_type_event as actyev', 'actyev.activite_id', '=', 'activites.id')
            ->leftjoin('type_events as tyev', 'tyev.id', '=', 'actyev.type_event_id')
            ->leftjoin('categories as ca', 'ca.id', '=', 'activites.categorie_id')
            ->whereMonth("start_date", $monthFormat)
            ->whereYear("start_date", $year)
            ->select("activites.title", "activites.location", "activites.start_date", "activites.end_date", "tyev.title as act_title", 'ca.name')
            ->get();

        // foreach ($activities as $activity) {
        //     if (is_null($activity->location) || $activity->location === '') {
        //         $activity->location = 'Aucune information';
        //     }
        // }

        // Initialisation du regroupement par location
        $groupedByCategorie = $activities->groupBy('name');

        $startRow = 7;

        foreach ($groupedByCategorie as $categorie => $activitie) {
            $sheet->mergeCells('A' . $startRow . ':A' . ($startRow + $activitie->count()));
            $sheet->setCellValue('A' . $startRow, $categorie);

        $data = [];

            foreach ($activitie as $item){
                $differenceDay = $item->start_date && $item->end_date ? Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1 : 1;
            $data[] = [
                "title" => $item->title,
                    "periode" => $item->start_date != $item->end_date ? Carbon::parse($item->start_date)->translatedFormat("d M") . " - " . Carbon::parse($item->end_date)->translatedFormat("d M") : Carbon::parse($item->start_date)->translatedFormat("d M"),
                "duree" => $differenceDay > 1 ? $differenceDay . " jours" : $differenceDay . " jour",
                "cible" => null,
                "nombre" => null,
                "lieu" => $item->location,
                "intervenant" => null,
                    "theme" => $item->act_title ? $item->act_title : null,
                "observateur" => null,
            ];
        }

            $sheet->fromArray($data, NULL, 'B' . $startRow);
            $startRow += count($data) + 1;
        }

        $cellRange = "A4:J" . ($sheet->getHighestRow() + 1);
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
        foreach (range('A', 'J') as $columnID) {
            if ($columnID === 'A' || $columnID === 'B') {
                $sheet->getColumnDimension('A')->setWidth(30);
                $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
                $sheet->getColumnDimension('B')->setWidth(50);
                $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
                $sheet->getRowDimension("2")->setRowHeight(30);
                $sheet->getRowDimension("6")->setRowHeight(25);
            }
            else {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        }
    }
}