<?php

namespace App\Console\Commands;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Models\CandidatAttribute;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ImportXlsx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-xlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importion fichier xlsx';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dir = './storage/importxlsx';
        $files = $this->getImportFiles($dir);
        // Recuperation des fichiers xls
        foreach($files as $file){
            $filePath = $dir."/".$file;

            try {
                // Charger le fichier Excel
                $spreadsheet = IOFactory::load($filePath);
            } catch (\Throwable $th) {
                $this->error('Erreur! veuillez verifier le fichier: '.$filePath);
            }

            $this->importBd($spreadsheet);
        }
        dd($files);
    }

    /**
     * Recupere tous les fichiers du repertoire
     */
    function getImportFiles($dir){
        $files = array_diff(scandir($dir), array('..', '.'));
        return $files;
    }


    function importBd($spreadsheet){

        foreach ($spreadsheet->getAllSheets() as  $worksheet) {
           
            $rowid = 3;
            $id = $worksheet->getcell("B{$rowid}")->getvalue();
            $rowdate = 5;
            //$date = $worksheet->getcell("H{$rowdate}")->getvalue();
            //$date = $worksheet->getcell("I{$rowdate}")->getvalue();
            $id = trim($id);

            try {
                $currentActivity = Activite::where('_id', $id )->first();
                
                if (!$currentActivity) {
                    $currentActivity = Activite::where('id', (int)$id )->first();
                }
            } catch (\Throwable $th) {
                $this->error('Erreur id On: '.$worksheet->getTitle());
            }
            $this->info('Processing...: '.$currentActivity->title);       

            for ($lineexcel = 6; $lineexcel <= $worksheet->getHighestRow(); $lineexcel++)
            {
                $prenom = $worksheet->getcell("B{$lineexcel}")->getvalue();
                $nom = $worksheet->getcell("C{$lineexcel}")->getvalue();
                $genre = $worksheet->getcell("D{$lineexcel}")->getvalue();
                //$numero = $worksheet->getcell("E{$lineexcel}")->getvalue();
                $email = $worksheet->getcell("F{$lineexcel}")->getvalue();
                $université = $worksheet->getcell("G{$lineexcel}")->getvalue(); 
              
                //Creation ou recuperation de l'utilisateur
                $odcuser = $this->createUser($email, $prenom, $nom, $genre);
               // print_r($odcuserData);
                $candidat = $this->createCandidat($odcuser, $currentActivity);

                $this->setPresences($worksheet, $candidat, $lineexcel);
                $this->saveNumber($candidat, $odcuser, $worksheet, $lineexcel);
            } 
        }
        $this->info('Importation exécutée avec succès');
    }
    
    function createUser($email, $prenom, $nom, $genre){

        $cond = ['email' => $email];
        if (empty($email)){
            $cond = ['last_name' => $nom, 'first_name' => $prenom];
        }
        $odcuser = Odcuser::firstOrCreate(
            $cond,
            [
                'first_name' => $prenom,
                'last_name' => $nom,
                'email' => $email ,
                'password'=> "hfkfhijskd5djhf",
                'gender' => $genre,
                'birth_date' => date("Y-m-d"),
                'linkedin' => null,
                'profession' => "{'profession':'etudiant'}",
                'odc_country' => null,
                'role' => 'user',
                'is_active' => 1,
                'hashtags' => null,
                'coding_school' => 1,
                'fablab_solidaire' => 1,
                'training' => 1,
                'internship' => 1,
                'event' => 1,
                'subscribe' => 1,
                'newsletters' => null,
                'topics' => null,
                'last_connection' => null,
                '_id' => "test",
                'detail_profession' => null,
                'createdAt' => date("Y-m-d h:i:s "),
                'updatedAt' => date("Y-m-d h:i:s "),
                '__v' => 1,
                'picture' => null,
                'user_cv' => null,
            ]
        );
        return $odcuser;
    }

    function createCandidat($odcuser, $currentActivity){
        $candidat = Candidat::firstOrCreate(['odcuser_id' => $odcuser->id,'activite_id' => $currentActivity->id],
            [
                'odcuser_id' => $odcuser->id,
                'activite_id' => $currentActivity->id,
                'status' => 1
            ]
        );
        return $candidat;
    }

    function setPresences($worksheet, $candidat, $lineexcel){
        $col = 'H';
        //$cols = ['H','I','J','K','L','M','N','O','P','Q'];
        $rowdate = 5;
        //$dates =[];

        while ($worksheet->getCell($col . $rowdate)->getValue() !== null) {
            $date = $worksheet->getCell($col . $rowdate)->getValue();
            $status = $worksheet->getcell($col.$lineexcel)->getvalue();
            
            if (!empty($date)) {
                $datemodif = explode('_', $date);
                if (isset($datemodif[1])) {
                    $dates = $datemodif[1]; // on garde seulement la partie "2024-01-29"
                }
            }
            //dump($status);
            //dump( $dates);
            //dump($col);
            if ($status == '1') {
                $presence = Presence::firstOrCreate(
                    ['date' => $dates, 'candidat_id' => $candidat->id],
                    [
                        'date' => $dates,
                        'candidat_id' => $candidat->id,
                    ]
                );
            }

            $col++;
            
        }


        

        //code  coach alain
        /*foreach ($cols as $key => $col) {
            $cell = "{$col}{$rowdate}";
            $date = $worksheet->getcell($cell)->getvalue();
            $status = $worksheet->getcell("{$col}{$lineexcel}")->getvalue();
            if(empty($date)){
                $date = "date_1970-01-01";
                $this->error('STOP!');
                break;
            }
            
            list($prx, $date) = explode('_', $date);
            //insertion
            if($status == '1'){
                $candidat = Presence::firstOrCreate(['date' => $date,'candidat_id' => $candidat->id],
                    [
                    'date' => $date,
                    'candidat_id' => $candidat->id,
                    ]
                );
            }
        }*/
    }

    function saveNumber($candidat, $odcuser, $worksheet, $lineexcel){
        $numero = $worksheet->getcell("E{$lineexcel}")->getvalue();
        $université = $worksheet->getcell("G{$lineexcel}")->getvalue();
        
        //verification phone number
        if(empty($numero)){
            $numero = "non defini";
        }

        //verification université
        if(empty($université)){
            $université = "non defini";
        }
        //dd($numero);
        //sauvegarde numero
        $savenumber = CandidatAttribute::firstOrCreate(['candidat_id' => $candidat->id],
        ['_id' => $odcuser->_id,
        'label' => 'numero',
        'value' => $numero,
        ]
        );

        //sauvegarde université
        $saveEtablissement = CandidatAttribute::firstOrCreate(['candidat_id' => $candidat->id],
        ['_id' => $odcuser->_id,
        'label' => 'Etablissement/Université',
        'value' => $université,
        ]
    );
    }
}
