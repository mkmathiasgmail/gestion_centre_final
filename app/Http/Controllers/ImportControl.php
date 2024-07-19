<?php

namespace App\Http\Controllers;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\CandidatAttribute;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ImportControl extends Controller
{
    public function index()
    {
        $activites = Activite::all();
        return view('components.activite-import'/*'import.import'*/, ['activites' => $activites]);
    }

    public function import(Request $request)
    {
        // Valider le fichier uploadé
        $request->validate([
            'file' => 'required',
            'activite' => 'required|exists:activites,id', // Valide que l'activité sélectionnée existe dans la table des activités
        ]);

        // Récupérer l'ID de l'activité à partir du formulaire
        $activiteId = $request->activite;

        // Lire le fichier
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        // Supposons que le fichier CSV contient des en-têtes
        $header = str_getcsv(array_shift($fileContents));
        // Parcourir les lignes du fichier CSV
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            $rowData = array_combine($header, $data);
            // Valider les données de chaque ligne
            //dump($rowData);
            try {
                $validatedData = $this->validateRowData($rowData);
                //dump($validatedData);
                // Chercher l'utilisateur par email 
                $odcuser = Odcuser::where('email', $validatedData['email'])->first();

                $validatedData['birth_date'] = '1970-02-05';
                $validatedData['password'] = 'kdjksjfkndjskjd5555';
                $validatedData['profession'] = "{'profession':'etudiant'}";
                //$validatedData['odc_country'] = "{'country':'congo'}";
                $validatedData['role'] = 'user';
                $validatedData['is_active'] = '1';
                $validatedData['_id'] = 'test';
                $validatedData['createdAt'] = date("Y-m-d h:i:s ");
                $validatedData['updatedAt'] = date("Y-m-d h:i:s ");
                //$validatedData['status']= 0;


                if ($odcuser) {
                    // Si l'utilisateur existe déjà, on recupere simplement son id.
                    $odcuser->update($validatedData);
                } else {
                    // Sinon, créez un nouvel utilisateur
                    $odcuser = Odcuser::create($validatedData);
                }

                //dd($odcuser);
                // Ajouter l'utilisateur à la table 'candidat'
                $candidat = Candidat::firstOrCreate(
                    [
                        'odcuser_id' => $odcuser->id,
                        'activite_id' => $activiteId
                    ],
                    [
                        'status' => $rowData['status']
                    ]
                );
                //sauvegarde numero
                if(empty($rowData['numero'])){
                    $rowData['numero']= 'non defini';
                }
                $setNumber = CandidatAttribute::firstOrCreate(
                    [
                        'candidat_id' => $candidat->id,
                        '_id' => $odcuser->_id,
                        'label' => 'numero',
                        'value' => $rowData['numero']
                    ]
                );
                //dd($setNumber);
                //sauvegarde université
                if(empty($rowData['etablissement/université'])){
                    $rowData['etablissement/université']= 'non defini';
                }
                $setEtablissement = CandidatAttribute::firstOrCreate(
                    [
                        'candidat_id' => $candidat->id,
                        '_id' => $odcuser->_id,
                        'label' => 'Etablissement/Université',
                        'value' => $rowData['etablissement/université']
                    ]
                );
                //dd($setEtablissement);

                //dd($candidat);
                //dump($rowData);
                $date = $rowData['date_1977-01-01'];
                //dd($date);
                //on remplie la table presence
                $datemodif = explode('_', $date);
                if (empty($date)){
                    continue; // Skip rows with empty date
                }else{
                    Presence::create([
                        'date' => $datemodif[1],
                        'candidat_id' => $candidat->id,
                    ]);
                }
                //dd($date);

                //dump($validatedData['statut']);
            } catch (\Illuminate\Validation\ValidationException $e) {
                Log::error('Validation failed for row: ', ['row' => $rowData, 'errors' => $e->errors()]);
                continue; // Skip invalid rows
            }
        }
        

        return redirect()->back()->with('success', 'Importation exécutée avec succès');
    }

    private function validateRowData($rowData)
    {
        // Définir les règles de validation spécifiques
        $validator = Validator::make($rowData, [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'gender' => '',
            'birth_date' => '',
            'linkedin' => '',
            'profession' => '',
            'odc_country' => '',
            'role' => '',
            'is_active' => '',
            'hashtags' => '',
            'coding_school' => '',
            'fablab_solidaire' => '',
            'training' => '',
            'internship' => '',
            'event' => '',
            'subscribe' => '',
            'newsletters' => '',
            'topics' => '',
            'last_connection' => '',
            '_id' => '',
            'detail_profession' => '',
            'createdAt' => '',
            'updatedAt' => '',
            '__v' => '',
            'picture' => '',
            'user_cv' => '',
            /*'status' => ''*/
        ]);

        // Si la validation échoue, lever une exception
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'activite' => 'required',
        ]);

        // Faire quelque chose avec les données (par exemple, les stocker dans une base de données)

        return redirect()->back()->with('success', 'Importation exécutée avec succès');
    }



    //function pour import hors activite

    public function indexacti()
    {
        $activites = Activite::all();
        return view(/*'components.activite-import'*/'import.import', ['activites' => $activites]);
    }

    public function download($filename)
    {
        $path = storage_path('app/public/' . $filename);
        //dd($path);

        if (!file_exists($path)) {
            abort(404, 'fichier non trouvé');
        }

        return response()->download($path);
    }

}