<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use App\Http\Requests\StoreCandidatRequest;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use App\Http\Requests\UpdateCandidatRequest;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Support\Facades\Log as FacadesLog;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Fill as cellFill;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Alignment as cellAlignment;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidats = Candidat::has('odcuser')->get();

        return view('candidats.index', compact('candidats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function generateExcel($id_event)
    {
        // Get the activite and its dates
        $activite = Activite::findOrFail($id_event);
        $start_date = Carbon::parse($activite->start_date);
        $end_date = Carbon::parse($activite->end_date);
        $dates = [];
        $fullDates = [];

        // Generate an array of dates between start and end dates
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            if (!$date->isWeekend()) {
                $dates[] = $date->format('d-m');
                $fullDates[] = $date->format('Y-m-d');
            }
        }

        // Get all candidats for the given event
        $candidats = Candidat::where('activite_id', $id_event)
            ->where('status', 'accept')
            ->with(['odcuser', 'candidat_attribute', 'presence'])
            ->get();

        // Initialize arrays for candidats data and labels
        $candidatsData = [];
        $labels = [];

        // Loop through each candidat and generate its data
        foreach ($candidats as $candidat) {
            $candidatArray = $candidat->toArray();

            // Add candidat attributes to the array
            if ($candidat->candidat_attribute) {
                foreach ($candidat->candidat_attribute as $attribute) {
                    $candidatArray[$attribute->label] = $attribute->value;
                    if (!in_array($attribute->label, $labels)) {
                        $labels[] = $attribute->label;
                    }
                }
            }

            // Get presences for the candidat
            $presences = Presence::where('candidat_id', $candidat->id)->get();
            $presence_dates = [];

            // Generate an array of presence dates
            foreach ($presences as $presence) {
                $presence_dates[] = date('Y-m-d', strtotime($presence->date));
            }

            // Add presence dates and state to the candidat array
            $candidatArray['date'] = $presence_dates;
            $presence_state = [];

            // Generate an array of presence states (1 or 0) for each date
            foreach ($fullDates as $date) {
                $presence_state[] = in_array($date, $presence_dates) ? 1 : "";
            }

            $candidatArray['presence_state'] = $presence_state;

            // Add the candidat array to the data array
            $candidatsData[] = $candidatArray;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the title and merge cells
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "FICHE DES CANDIDATS POUR " . strtoupper($activite->title))
            ->mergeCells('A1:U2')
            ->getStyle('A1:U2')
            ->getAlignment()->setVertical(cellAlignment::VERTICAL_CENTER)
            ->setHorizontal(cellAlignment::HORIZONTAL_CENTER);

        // Set the column headers
        $spreadsheet->getActiveSheet()
            ->setCellValue('A3', 'N°')
            ->setCellValue('B3', 'NOM')
            ->setCellValue('C3', 'PRENOM')
            ->setCellValue('D3', 'GENRE')
            ->setCellValue('E3', 'NUMERO')
            ->setCellValue('F3', 'EMAIL');

        $daysOfWeek = [
            'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'
        ];
        $columnIndex = 7; // Starting column index (H)
        $index = 7;
        foreach ($daysOfWeek as $day) {
            $cellCoordinate = Coordinate::stringFromColumnIndex($columnIndex) . '3';
            $spreadsheet->getActiveSheet()
                ->setCellValue($cellCoordinate, $day)
                ->mergeCells($cellCoordinate . ":" . Coordinate::stringFromColumnIndex($columnIndex + 2) . "3")
                ->getStyle($cellCoordinate . ":" . Coordinate::stringFromColumnIndex($columnIndex + 2) . "3")
                ->getAlignment()
                ->setVertical(cellAlignment::VERTICAL_CENTER)
                ->setHorizontal(cellAlignment::HORIZONTAL_CENTER);
            $columnIndex += 3; // Increment column index by 3 (since we're merging 3 cells)

            $cellC = Coordinate::stringFromColumnIndex($index);
            $spreadsheet->getActiveSheet()
                ->getColumnDimension(Coordinate::stringFromColumnIndex($index))
                ->setAutoSize(false)
                ->setWidth(45, 'px');

            $spreadsheet->getActiveSheet()
                ->getColumnDimension(Coordinate::stringFromColumnIndex($index + 1))
                ->setAutoSize(false)
                ->setWidth(45, 'px');

            $spreadsheet->getActiveSheet()
                ->getColumnDimension(Coordinate::stringFromColumnIndex($index + 2))
                ->setAutoSize(false)
                ->setWidth(45, 'px');

            $spreadsheet->getActiveSheet()
                ->setCellValue($cellC . "4", "H/E");
            $spreadsheet->getActiveSheet()
                ->setCellValue(Coordinate::stringFromColumnIndex($index + 1) . "4", "H/S");
            $spreadsheet->getActiveSheet()
                ->setCellValue(Coordinate::stringFromColumnIndex($index + 2) . "4", "Sign");

            $spreadsheet->getActiveSheet()
                ->getStyle($cellC . "4:" . Coordinate::stringFromColumnIndex($index + 2) . "4")
                ->getAlignment()
                ->setVertical(cellAlignment::VERTICAL_CENTER)
                ->setHorizontal(cellAlignment::HORIZONTAL_CENTER);
            $index += 3;
        }

        // Set the style for titles
        $style_for_titles = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => cellAlignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A3:S3')->applyFromArray($style_for_titles);

        // Set the column widths
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(false)
            ->setWidth(34, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(false)
            ->setWidth(184, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(false)
            ->setWidth(100, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setAutoSize(false)
            ->setWidth(90, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setAutoSize(false)
            ->setWidth(94, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setAutoSize(false)
            ->setWidth(234, 'px');

        // Set the fill color for the header row
        $spreadsheet->getActiveSheet()->getStyle('A4:F4')
            ->getFill()->setFillType(cellFill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A4:F4')
            ->getFill()->getStartColor()->setARGB('000000');

        // Loop through each candidat and set its data
        $cell_key = 5;
        $i = 1;
        foreach ($candidatsData as $candidat) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("A$cell_key", "$i");

            $name = isset($candidat['Nom']) ? $candidat['Nom'] : $candidat['odcuser']['last_name'];
            $spreadsheet->getActiveSheet()
                ->setCellValue("B$cell_key", $name);

            $first_name = isset($candidat['Prénom']) ? $candidat['Prénom'] : $candidat['odcuser']['first_name'];
            $spreadsheet->getActiveSheet()
                ->setCellValue("C$cell_key", $first_name);

            $spreadsheet->getActiveSheet()
                ->setCellValue("D$cell_key", $candidat['odcuser']['gender']);

            $phone = isset($candidat['Téléphone']) ? $candidat['Téléphone'] : '';
            $spreadsheet->getActiveSheet()
                ->setCellValue("E$cell_key", $phone)
                ->getCell("E$cell_key")
                ->setValueExplicit($phone, DataType::TYPE_STRING)
                ->getStyle("E$cell_key")
                ->getAlignment()
                ->setHorizontal(cellAlignment::HORIZONTAL_RIGHT);

            $email = isset($candidat['E-mail']) ? $candidat['E-mail'] : $candidat['odcuser']['email'];
            $spreadsheet->getActiveSheet()
                ->setCellValue("F$cell_key", $email);

            $styleArrayForBorders = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb ' => '000000'],
                    ],
                ],
            ];

            $spreadsheet->getActiveSheet()
            ->getStyle('A1:U8')
            ->applyFromArray($styleArrayForBorders);

            $i++;
            $cell_key++;
        }

        // Set font for body
        $spreadsheet->getDefaultStyle()->getFont()->setName('Verdana')->setSize(8);

        // Create a writer for the Spreadsheet
        $writer = new Xlsx($spreadsheet);

        // Create a temporary file for the Excel file
        $tmp = tempnam(sys_get_temp_dir(), "Participants.Xlsx");

        // Save the Excel file to the temporary file
        $writer->save($tmp);

        // Return the Excel file as a download response
        return response()->download($tmp, "Participants.Xlsx")->deleteFileAfterSend(true);
    }

    public function updateStatus(Request $request, $status)
    {
        // Validate the status
        if (!in_array($status, ['accept', 'decline', 'wait'])) {
            // Return an error response if the status is invalid
            return response()->json(['error' => 'Invalid status'], 300);
        }

        // Get the ID from the request
        $candidat = Candidat::find($request->input('id'));
        
        if (!$candidat) {
            // Return an error response if the candidat is not found
            return response()->json(['error' => 'Candidat not found'], 404);
        }
        // Perform the necessary action based on the status
        switch ($status) {
            case 'accept':
                $candidat->status = 'accept';
                $candidat->save();
                return response()->json(['message' => 'Candidate successfully validated!'], 200);
                break;

            case 'decline':
                $candidat->status = 'decline';
                $candidat->save();
                return response()->json(['message' => 'Application successfully rejected!'], 200);
                break;

            case 'wait':
                $candidat->status = 'wait';
                $candidat->save();
                return response()->json(['message' => 'Candidate successfully put on hold!'], 200);
                break;
            default:
                return response()->json(['Erreur lors de la mise a jour du statut!']);
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FacadesLog::info('storeCandidats called');
        // Validate the incoming request data
        $validatedData = $request->validate([
            'odcuser_id' => 'required',
            'activite_id' => 'required'
        ]);

        // Find the Odcuser and Activite by their respective _id fields
        $odcuser = Odcuser::where('_id', $validatedData['odcuser_id'])->first();
        $activite = Activite::where('_id', $validatedData['activite_id'])->first();

        if ($odcuser && $activite) {
            // Create a new Candidat record
            $candidat = Candidat::firstOrCreate([
                'odcuser_id' => $odcuser->id,
                'activite_id' => $activite->id,
                'status' => 'new'

            ]);
            FacadesLog::warning('User or Event not found', ['odcuser_id' => $candidat['odcuser_id'], 'activite_id' => $candidat['activite_id']]);
            return response()->json(['success' => true, 'candidat' => $candidat], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'User or Event not found'], 303);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        return view('candidats.show', compact('candidat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatRequest $request, Candidat $candidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat)
    {
        //
    }
}
