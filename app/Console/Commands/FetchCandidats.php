<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Odcuser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCandidats extends Command
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
    protected $description = 'Command for fetching all  the candidates from the api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Syncing candidates from api ...');
        // $jsonCandidatsAWS = base_path('aws.json') ;
        // $candidatsData = json_decode(file_get_contents($jsonCandidatsAWS));
        $url = env('API_URL');
        $activites = Activite::pluck('_id')->toArray();

        foreach ($activites as $key => $value) {
            $queryEvent = Http::timeout(10000)->get("$url/events/show/$value") ;
        }
        
        if ($queryEvent->successful()) {
            $data = $queryEvent->object();
            $candidats = $data->data ; 
            $e = 1 ;

            foreach ($candidats as $candidat) {
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
                        $this->info("Update success ! ");
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
