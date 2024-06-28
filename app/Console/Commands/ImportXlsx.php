<?php

namespace App\Console\Commands;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
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

        //Recuperer les activites
        $activites = Activite::all();

        //Recuperer les candidats
        $candidats = Candidat::all();

        //Recuperer les odcusers
        $odcusers = Odcuser::all();

        // le chemin du fichier Excel
        $filePath = base_path('storage/importxlsx/Presences1.xlsx');
        // Charger le fichier Excel
        $spreadsheet = IOFactory::load($filePath);

        // Vérifier si le fichier existe
        if (!file_exists($filePath)) {
            $this->error('File does not exist at the specified path.');
            return;
        }

        //sauvegarde dans ma base de donnée
        
            foreach ($spreadsheet->getAllSheets() as $worksheet) {
                $rowid = 3;
                $activityId = $worksheet->getcell("B{$rowid}")->getvalue();
                $rowdate = 5;
                $date = $worksheet->getcell("H{$rowdate}")->getvalue();
                $activitecheck = Activite::where('_id', $activityId )->first();

                if (!$activitecheck) {
                    echo "Vérifiez _id dans votre fichier Excel il semble qu'il est manquant";
                    continue;
                }

                for ($lineexcel = 6; $lineexcel <= $worksheet->getHighestRow(); $lineexcel++)
                {
                    $prenom = $worksheet->getcell("B{$lineexcel}")->getvalue();
                    $nom = $worksheet->getcell("C{$lineexcel}")->getvalue();
                    $genre = $worksheet->getcell("D{$lineexcel}")->getvalue();
                    $numero = $worksheet->getcell("E{$lineexcel}")->getvalue();
                    $email = $worksheet->getcell("F{$lineexcel}")->getvalue();
                    $université = $worksheet->getcell("G{$lineexcel}")->getvalue();
                    $status = $worksheet->getcell("H{$lineexcel}")->getvalue(); 

                    //check for the existance email
                    for($idtest = 1; $idtest<=200; $idtest++){
                        if (empty($email)){
                            $email = "test{$idtest}@gmail.com";
                            continue;
                        }
                    }

                    
                   // print_r($odcuserData);
                    $odcuser = Odcuser::firstOrCreate(
                        ['email' => $email, 'first_name' => $prenom],
                        [
                            //'first_name' => $prenom,
                            'last_name' => $nom,
                            'email' => $email ,
                            'password'=> "hfkfhijskd5djhf",
                            'gender' => $genre,
                            'birth_date' => date("Y-m-d"),
                            'linkedin' => null,
                            'profession' => "{'profession':'etudiant'}",
                            'odc_country' => "{'country':'rdc', 'country':'bresil'}",
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

                    if(empty($status)){
                        $status = 0;
                        continue;
                    }

                $candidat = Candidat::create(
                    [
                        'odcuser_id' => $odcuser->id,
                        'activite_id' => $activitecheck->id,
                        'status' => $status
                    ]
                );

                //on remplie la table presence
                $datemodif = explode('_', $date);
                Presence::create([
                    'date' => $datemodif[1],
                    'candidat_id' => $candidat->id,
                ]);

            } 
        }
            
            $this->info('Importation exécutée avec succès');
         /*catch (\Exception $e) {
            Log::error('Failed to import file: ' . $e->getMessage());
            $this->error('Failed to import file.');
        }*/
    }
}
