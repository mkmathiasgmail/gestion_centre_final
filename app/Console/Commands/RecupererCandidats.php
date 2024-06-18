<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Odcuser;
use Illuminate\Console\Command;

class RecupererCandidats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:candidats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonCandidatsAWS = base_path('aws.json') ;
        $candidatsData = json_decode(file_get_contents($jsonCandidatsAWS));
        
        if ($candidatsData !== null) {
            $CandidatsAWS = $candidatsData->data ;  
            $e = 1 ;

            foreach ($CandidatsAWS as $candidat) {
                $this->info($candidat->user->_id);
                $odcuser = Odcuser::where('_id', $candidat->user->_id)->first();
                $activite = Activite::where('_id', $candidat->event->_id)->first();
                
                if($odcuser && $activite){
                    $candidatInfo = [
                        'odcuser_id' => $odcuser->id,
                        'activite_id' => $activite->id,
                        'status' => 1
                    ] ;

                    // creation et mise a jour
                    $existingCandidat = Candidat::where('odcuser_id', $odcuser->id)->first() ;

                    if($existingCandidat) {
                        $existingCandidat->update($candidatInfo) ;
                        $this->info("{$candidat->user->firstName} mis a jour avec succes ! ");
                    } else {
                        Candidat::create($candidatInfo);
                        $this->info("Candidate {$e} created successfully.");
                    }
                }
                $e++;

            }
            $this->info("Data synced successfully");
        } else {
            $this->info("Failed to retrieve candidates data ! Please retry !");
        }
    }
}
