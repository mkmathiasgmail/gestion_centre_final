<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Activite;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MonthlyPlanningExport implements WithMultipleSheets
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];
        $months = $this->data->groupBy(function ($item) {
            return Carbon::parse($item->date_debut)->format("F");
        });

        $monthNumeric = $months->mapWithKeys(function ($item, $month){
            return [Carbon::parse($item->first()->date_debut)->format("n") => $item];
        });

        $sortedMonth = $monthNumeric->sortKeys();

        foreach ($sortedMonth as $month => $items) {
            $monthName = Carbon::create()->month($month)->format("F");
            $sheets[] = new SingleMonthSheet($monthName);
        }

        return $sheets;
    }
}


class SingleMonthSheet implements FromCollection, WithMapping, WithHeadings, WithTitle, ShouldAutoSize, WithEvents
{
    protected $month;

    public function __construct($month){
        $this->month = $month;
    }

    public function collection()
    {
        $monthformat = Carbon::parse($this->month)->format("m");
        $activities = Activite::select("title", "lieu", "date_debut", "date_fin")->whereMonth("date_debut", $monthformat)->get();

        $combineData = new Collection();

        $combineData->push(["title" => "", "periode" => "", "duree" => "", "cible" => "", "nombre" => "", "lieu" => "", "intervenant" => "", "theme" => "", "observateur" => ""]);

        foreach ($activities as $item) {
            $differenceDay = $item->date_debut && $item->date_fin ? Carbon::parse($item->date_debut)->diffInDays(Carbon::parse($item->date_fin)) : 1;
            $combineData->push([
                "title" => $item->title,
                "periode" => $item->date_fin ? Carbon::parse($item->date_debut)->translatedFormat("d-M") . " - " . Carbon::parse($item->date_fin)->translatedFormat("d-M") : Carbon::parse($item->date_debut)->translatedFormat("d-M"),
                "duree" => $differenceDay > 1 ? $differenceDay . " jours" : $differenceDay . " jour",
                "cible" => null,
                "nombre" => null,
                "lieu" => $item->lieu,
                "intervenant" => null,
                "theme" => null,
                "observateur" => null,
            ]);
        }
        
        return $combineData;
    }

    public function map($row): array
    {
        return [
            $row['title'],
            $row['periode'],
            $row['duree'],
            $row['cible'],
            $row['nombre'],
            $row['lieu'],
            $row['intervenant'],
            $row['theme'],
            $row['observateur'],
        ];
    }

    public function headings(): array
    {
        return [
            'Activité',
            'Période',
            'Durée',
            'Cible',
            'Nombre',
            'Lieu',
            'Intervenant',
            'Thème de l\'activité',
            'Observateur',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->insertNewRowBefore(1, 1);

                $sheet->insertNewRowBefore(2, 2);

                $sheet->mergeCells('A2:I2');

                $richText = new RichText();

                $part1 = $richText->createTextRun("Planning des activités Academy Digital ");
                $part1->getFont()->setBold(true);
                $part1->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color("ff000000"));
                $part1->getFont()->setSize(18);

                $part2 = $richText->createTextRun(": ". $this->month . " " . Carbon::now()->format("Y"));
                $part2->getFont()->setBold(true);
                $part2->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color("ffffaa40"));
                $part2->getFont()->setSize(18);

                $sheet->getCell("A2")->setValue($richText);

                $sheet->insertNewRowBefore(6, 2);

                $sheet->mergeCells('A6:I6');
                
                $sheet->setCellValue("A6", $this->month);

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
        ];
    }

    public function title(): string
    {
        return $this->month;
    }
}