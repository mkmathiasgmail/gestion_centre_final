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
                $odcusers = Odcuser::all();
                $activites = Activite::all();

                foreach ($odcusers as $odcuser) {
                    if ($odcuser->_id == $candidat->user->_id) {
                        $odcuser_id = $odcuser->id ;
                    }
                }
                
                $existingCandidat = Odcuser::where('_id', $candidat->user->_id);
                $candidatInfo = [
                    'odcuser_id' => $odcuser_id,
                    'activite_id' => 1,
                    'status' => 1
                ] ;
                Candidat::create($candidatInfo) ;
                $this->info("Candidate created successfully.");
                // if ($existingCandidat) {
                //     $existingCandidat->update($candidatInfo);
                //     $this->info("{$candidat->user->firstName} updated successfully.");
                // } else {
                // }

                $this->info("Data synced successfully : " . $e . " %");
                $e++;
            }
        } else {
            $this->info("Failed to retrieve candidates data ! Please retry !");
        }
    }
}
