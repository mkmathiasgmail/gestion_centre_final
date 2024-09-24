<?php

namespace App\Http\Controllers;




use DateTime;
use App\Models\Poste;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Entreprise;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use App\Models\Employabilite;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Resources\EmployabiliteResource;
use App\Http\Requests\StoreEmployabiliteRequest;
use App\Http\Requests\UpdateEmployabiliteRequest;

class EmployabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //
        $employabilites = Employabilite::whereRaw(
            "
            id in (
                SELECT  max(e.id) FROM `employabilites` as e
                inner join odcusers as o
                on o.id= e.odcuser_id
                group by o.id
            )"
        )
            ->get();


        // ici on récupère les 3 derniers postes de l'utilisateur
        foreach ($employabilites as $key => $employabilite) {
            $usr_empl = Employabilite::query()->where('odcuser_id', $employabilite->odcuser_id)->orderBy('id', 'desc')->take(3)->get();
            $user_postes = [];
            $user_nomboites = [];
            $user_periodes = [];
            // ici on récupère le nom de la boite et le poste de l'utilisateur
            foreach ($usr_empl as $key => $user_e) {
                $user_postes[] = $user_e->poste;
                $user_nomboites[] = $user_e->nomboite;
                $user_periodes[] = $user_e->periode;
            }

            $postes = implode('<br> ', $user_postes,);
            $nomboites = implode('<br> ', $user_nomboites,);
            $periode = implode('<br> ', $user_periodes,);
            $employabilite['nomboites'] = $nomboites;
            $employabilite['postes'] = $postes;
            $employabilite['periodes'] = $periode;
        }


        // }
        $typeContrats = TypeContrat::all();

        return view('employabilites.index', compact('employabilites', 'typeContrats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employabilite.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreEmployabiliteRequest $request)
    {



        // $employabiliteId = Employabilite::query()->latest()->first()->id;

        // Poste::create([
        //     'libelle' => $request->input('poste'),
        //     'employabilite_id' => $employabiliteId,
        // ]);

        // Poste::create([
        //     'libelle' => $request->input('poste1'),
        //     'employabilite_id' => $employabiliteId,
        // ]);

        // Entreprise::create([
        //     'nomboite' => $request->input('nomboite'),
        //     'employabilite_id' => $employabiliteId,
        // ]);
        // Entreprise::create([
        //     'nomboite' => $request->input('nomboite1'),
        //     'employabilite_id' => $employabiliteId,
        // ]);

        $name = $request->input('first_name');
        $names = explode(' ', $name);

        $firstName = $names[0];
        $lastName = '';

        // Vérifiez si le tableau $names contient au moins trois éléments
        if (count($names) >= 3) {

            // Si le tableau contient quatre éléments ou plus, combinez les troisième et quatrième éléments
            if (isset($names[3])) {
                $lastName = $names[2] . ' ' . $names[3];
            } else {
                $lastName = $names[2];
            }
        }

        // Récupérer les activités liées au candidat
        $activites = DB::table("activites")
            ->join('categories as ca', 'ca.id', '=', 'activites.categorie_id')
            ->join('candidats as cnd', 'cnd.activite_id', '=', 'activites.id')
            ->join('odcusers as od', 'od.id', '=', 'cnd.odcuser_id')
            ->select('activites.title', 'ca.name', 'activites.start_date', 'activites.end_date')
            ->where('od.first_name', '=', $firstName)
            ->where('od.last_name', '=', $lastName)
            ->orderBy('end_date', 'desc')
            ->get();

        // Vérifications des dates
        $dateEmployabilite = $request->periode;

        $dernierActivite = Activite::first();
        // Recherche de la dernière activité
        $dateFinDerniereActivite = $dernierActivite->end_date;


        try {

            $dateEmployabilite = new DateTime($request->periode);
            $dateFinDerniereActivite = new DateTime($dateFinDerniereActivite);
            $dateAujourdhui = new DateTime();

            // Vérifier si la date d'employabilité est supérieure à la dernière activité
            if ($dateEmployabilite > $dateFinDerniereActivite) {
                if ($dateEmployabilite <= $dateAujourdhui) {
                    Employabilite::create([
                        'name' => $request->first_name,
                        'poste' => $request->poste,
                        'nomboite' => $request->nomboite,
                        'periode' => $request->periode,
                        'derniere_activite' => $activites->first()->title,
                        'derniere_service' => $activites->first()->name,
                        'date_participation' => $activites->first()->start_date,
                        'genre' => $request->genre,
                        'tranche_age' => $request->tranche_age,
                        'niveau_academique' => $request->niveau_academique,
                        'odcuser_id' => $request->id_user,
                        'type_contrat_id' => $request->type_contrat
                    ]);
                    return redirect()->route('employabilites.index')->with('success', 'Employé ajouté avec succès');
                } else {
                    return back()->with('error', 'La date d\'employabilité ne doit pas être supérieure à la date du jour');
                }
            } else {
                return back()->with('error', 'La date d\'employabilité doit être supérieure à la dernière activité');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Erreur lors de l\'ajout de l\'employabilité parce que cette personne n\'a pas d\'activités');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employabilite $employabilite) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employabilite $employabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployabiliteRequest $request, Employabilite $employabilite) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

    public function getEmplois(Request $request, $id)
    {
        try {
            $query = Employabilite::where('odcuser_id', $id)->get();

            return DataTables::of($query)
                ->editColumn('id', function ($employe) {
                    return $employe->id;
                })
                ->editColumn('name', function ($employe) {
                    return $employe->name;
                })
                ->editColumn('nomboite', function ($employe) {
                    return $employe->nomboite;
                })
                ->editColumn('poste', function ($employe) {
                    return $employe->poste;
                })
                ->editColumn('periode', function ($employe) {
                    $periode = strtotime($employe->periode);
                    $periode = date('d-m-Y', $periode);
                    return $employe->periode;
                })


                ->addColumn('action', function ($employe) {
                    return view('partials.action-employabilite', ['employe' => $employe])->render();
                })
                ->rawColumns(['action'])

                ->make(true);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Une erreur est survenue : ' . $th->getMessage()], 500);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|',
        ], [
            'file.required' => 'Un fichier est requis.',
            'file.file' => 'Le fichier doit être un fichier valide.',
            'file.mimes' => 'Le fichier doit être au format CSV.',

        ]);

        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        $header = str_getcsv(array_shift($fileContents));

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            $rowData = array_combine($header, $data);

            try {
                $typeContrat = TypeContrat::select('id')->where('libelle', $rowData['type_contrat'])->first();
                unset($rowData['type_contrat']);
                $rowData['type_contrat_id'] = $typeContrat->id;

                $validatedData = $this->validateRowData($rowData);

                $odcuser = Odcuser::select('id')->where('first_name', $validatedData['name'])->where('last_name', $validatedData['last_name'])->first();
                unset($validatedData['last_name']);


                if ($odcuser) {
                    $validatedData['odcuser_id'] = $odcuser->id;


                    Employabilite::create($validatedData);
                } else {
                    Employabilite::create($validatedData);
                }
            } catch (\Throwable $th) {
                return response()->json(['error' => 'Une erreur est survenue : ' . $th->getMessage()], 500);
            }
        }
        return redirect()->back()->with('success', 'Importation exécutée avec succès');
    }

    private function validateRowData($rowData)
    {

        // Définir les règles de validation spécifiques
        $validator = Validator::make($rowData, [
            'name' => '',
            'last_name' => '',
            'nomboite' => '',
            'poste' => '',
            'periode' => '',
            'derniere_activite' => '',
            'derniere_service' => '',
            'date_participation' => '',
            'genre' => '',
            'tranche_age' => '',
            'niveau_academique' => '',
            'type_contrat_id' => '',

        ]);

        // Si la validation échoue, lever une exception
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }

    public function exportModelEmploye(Request $request)
    {

        //header of our spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Model 1'); // This is where I set the title of my sheet
        /*here is the header of my sheet*/
        $sheet->setCellValue('A1', 'name');
        $sheet->setCellValue('B1', 'last_name');
        $sheet->setCellValue('C1', 'nomboite');
        $sheet->setCellValue('D1', 'type_contrat');
        $sheet->setCellValue('E1', 'poste');
        $sheet->setCellValue('F1', 'periode');
        $sheet->setCellValue('G1', 'derniere_activite');
        $sheet->setCellValue('H1', 'derniere_service');
        $sheet->setCellValue('I1', 'date_participation');
        $sheet->setCellValue('J1', 'genre');
        $sheet->setCellValue('K1', 'tranche_age');
        $sheet->setCellValue('L1', 'niveau_academique');


        $sheet->fromArray([['nehemie',
            'mat',
            'ORANGE',
            'CDI',
            'DEV',
            '2024-09-10',
            'parcour academique',
            'coding school',
            '2024-04-15',
            'M',
            '25-36',
            'licence'
        ],
            [ 'sussan',
                    'lab',
                    'notifier',
                    'CDI',
                    'peintre',
                    '2024-09-10',
                    'parcour academique',
                    'coding school',
                    '2024-04-15',
                    'M',
                    '25-36',
                    'licence'
                ]],
         NULL, 'A2');


        // Save the spreadsheet to a temporary file
        $writer = new Xlsx($spreadsheet);
        $fileName = "Model du fichier d'importation_employabilite.xlsx";
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        $writer->save("php://output");
        exit();
    }

}