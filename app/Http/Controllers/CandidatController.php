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
