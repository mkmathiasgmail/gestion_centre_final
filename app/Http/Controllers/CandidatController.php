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
use App\Http\Requests\StoreCandidatRequest;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use App\Http\Requests\UpdateCandidatRequest;
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
                $presence_state[] = in_array($date, $presence_dates) ? 1 : 0;
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
            ->mergeCells('A1:H2')
            ->getStyle('A1:H2')
            ->getAlignment()->setVertical(cellAlignment::VERTICAL_CENTER)
            ->setHorizontal(cellAlignment::HORIZONTAL_CENTER);

        // Set the headers
        $spreadsheet->getActiveSheet()
            ->setCellValue('A3', "ID")
            ->mergeCells('B3:F3')
            ->setCellValue('B3', $activite->_id);

        // Set the column headers
        $spreadsheet->getActiveSheet()
            ->setCellValue('A4', 'N°')
            ->setCellValue('B4', 'NOM')
            ->setCellValue('C4', 'PRENOM')
            ->setCellValue('D4', 'GENRE')
            ->setCellValue('E4', 'NUMERO')
            ->setCellValue('F4', 'EMAIL')
            ->setCellValue('G4', 'UNIVERSITE')
            ->setCellValue('H4', 'PRESENCE')
            ->mergeCells("H4:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(7 + count($dates)) . "4")
            ->getStyle("H4:" . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(7 + count($dates)) . "4")
            ->getAlignment()
            ->setVertical(cellAlignment::VERTICAL_CENTER)
            ->setHorizontal(cellAlignment::HORIZONTAL_CENTER);

        // Set the dates headers
        $col = 'H';
        foreach ($dates as $date) {
            $spreadsheet->getActiveSheet()
                ->setCellValue("$col" . 5, $date)
                ->getStyle("$col" . 5)
                ->getAlignment()
                ->setHorizontal(cellAlignment::HORIZONTAL_RIGHT);

            $spreadsheet->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(false)
                ->setWidth(50, 'px');

            $col++;
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

        $spreadsheet->getActiveSheet()->getStyle('A4:H4')->applyFromArray($style_for_titles);

        // Set the column widths
        $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(185, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(false)
            ->setWidth(35, 'px');
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
            ->setWidth(95, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setAutoSize(false)
            ->setWidth(235, 'px');
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('G')
            ->setAutoSize(false)
            ->setWidth(300, 'px');

        // Set the fill color for titles
        $spreadsheet->getActiveSheet()->getStyle('A4:H4')
            ->getFill()->setFillType(cellFill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A4:H4')
            ->getFill()->getStartColor()->setARGB('9bc2e6');

        // Set the fill color for the header row
        $spreadsheet->getActiveSheet()->getStyle('A5:G5')
            ->getFill()->setFillType(cellFill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A5:G5')
            ->getFill()->getStartColor()->setARGB('000000');

        // Loop through each candidat and set its data
        $cell_key = 6;
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

            $university = isset($candidat["Nom de l'Etablissement / Université"]) ? $candidat["Nom de l'Etablissement / Université"] : (isset($candidat['Université']) ? $candidat['Université'] : "");
            $spreadsheet->getActiveSheet()
                ->setCellValue("G$cell_key", $university);

            $column = 'H';
            foreach ($candidat['presence_state'] as $state) {
                $spreadsheet->getActiveSheet()
                    ->setCellValue("$column$cell_key", $state);
                $column++;
            }

            $i++;
            $cell_key++;
        }

        // Create a writer for the Spreadsheet
        $writer = new Xlsx($spreadsheet);

        // Create a temporary file for the Excel file
        $tmp = tempnam(sys_get_temp_dir(), "coach.Xlsx");

        // Save the Excel file to the temporary file
        $writer->save($tmp);

        // Return the Excel file as a download response
        return response()->download($tmp, "coach.Xlsx")->deleteFileAfterSend(true);
    }

    public function accept(Request $request)
    {
        $candidat = Candidat::find($request->input('id'));
        $candidat->status = 'accept';
        if($candidat->save()){
            return response()->json(['message' => $candidat]);
        } else {
            return response()->json(['Erreur obtenue']);
        }
    }

    public function decline(Request $request)
    {
        $candidat = Candidat::find($request->input('id'));
        if ($candidat) {
            $candidat->status = 'decline';
            $candidat->save();
        }
        return response()->json(['message' => 'Status updated successfully!']);
    }

    public function wait(Request $request)
    {
        $candidat = Candidat::find($request->input('id'));
        if ($candidat) {
            $candidat->status = 'wait';
            $candidat->save();
        }
        return response()->json(['message' => 'Status updated successfully!']);
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
            return response()->json(['success' => false, 'message' => 'User or Event not found'], 404);
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
