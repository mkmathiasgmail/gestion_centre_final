<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\StoreCandidatRequest;
use App\Http\Requests\UpdateCandidatRequest;
use Illuminate\Support\Facades\Log as FacadesLog;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;

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
        $event = Activite::find($id_event);
        $candidats = Candidat::where('activite_id', $id_event)->with(['odcuser', 'candidat_attribute', 'presence'])->get();
        $candidatsData = [];
        $labels = [];
        foreach ($candidats as $candidat) {
            $candidatArray = $candidat->toArray();
            if ($candidat->candidat_attribute) {
                foreach ($candidat->candidat_attribute as $attribute) {
                    $candidatArray[$attribute->label] = $attribute->value;
                    if (!in_array($attribute->label, $labels)) {
                        $labels[] = $attribute->label;
                    }
                }
            }
            $candidatsData[] = $candidatArray;
        }
        $title = $event->title;
        $activite = strtoupper($title);
        $spreadsheet = new Spreadsheet();

        // Set cell A1 with a string value
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "FICHE DES CANDIDATS POUR " . $activite)
            ->mergeCells('A1:H2')
            ->getStyle('A1:H2')
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()
            ->setCellValue('A3', "ID");

        $spreadsheet->getActiveSheet()
            ->mergeCells('B3:F3')
            ->setCellValue('B3', $event->_id);

        $spreadsheet->getActiveSheet()
            ->setCellValue('A4', 'N°');

        $spreadsheet->getActiveSheet()
            ->setCellValue('B4', 'NOM');

        $spreadsheet->getActiveSheet()
            ->setCellValue('C4', 'PRENOM');

        $spreadsheet->getActiveSheet()
            ->setCellValue('D4', 'GENRE');

        $spreadsheet->getActiveSheet()
            ->setCellValue('E4', 'NUMERO');

        $spreadsheet->getActiveSheet()
            ->setCellValue('F4', 'EMAIL');

        $spreadsheet->getActiveSheet()
            ->setCellValue('G4', 'UNIVERSITE');

        $spreadsheet->getActiveSheet()
            ->setCellValue('H4', 'PRESENCE');

        $style_for_titles = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A4:H4')->applyFromArray($style_for_titles);

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

        $spreadsheet->getActiveSheet()->getStyle('A4:H4')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A4:H4')
            ->getFill()->getStartColor()->setARGB('9bc2e6');

        $spreadsheet->getActiveSheet()
            ->mergeCells('A5:G5');
        $spreadsheet->getActiveSheet()->getStyle('A5:G5')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $spreadsheet->getActiveSheet()->getStyle('A5:G5')
            ->getFill()->getStartColor()->setARGB('000000');

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
                ->setCellValue("E$cell_key", $phone);

            // Get the cell object to apply formatting and Set cell value explicitly as text
            $spreadsheet->getActiveSheet()
                ->getCell("E$cell_key")
                ->setValueExplicit($phone, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->getStyle("E$cell_key")
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $email = isset($candidat['E-mail']) ? $candidat['E-mail'] : $candidat['odcuser']['email'];
            $spreadsheet->getActiveSheet()
                ->setCellValue("F$cell_key", $email);

            $university = isset($candidat["Nom de l'Etablissement / Université"]) ? $candidat["Nom de l'Etablissement / Université"] : "";
            $spreadsheet->getActiveSheet()
                ->setCellValue("G$cell_key", $university);

            $i++;
            $cell_key++;
        }


        $writer = new Xlsx($spreadsheet);
        $name = "coach.Xlsx";
        $tmp = tempnam(sys_get_temp_dir(), $name);
        $writer->save($tmp);

        return response()->download($tmp, $name)->deleteFileAfterSend(true);
    }

    public function validate($id)
    {
        $candidat = Candidat::find($id);
        if ($candidat) {
            $candidat->status = 'accept';
            $candidat->save();
        }

        return redirect()->back();
    }

    public function reject($id)
    {
        $candidat = Candidat::find($id);
        if ($candidat) {
            $candidat->status = 'decline';
            $candidat->save();
        }

        return redirect()->back();
    }

    public function await($id)
    {
        $candidat = Candidat::find($id);
        if ($candidat) {
            $candidat->status = 'wait';
            $candidat->save();
        }

        return redirect()->back();
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
                'status' => 1 // Assuming default status is 1
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
