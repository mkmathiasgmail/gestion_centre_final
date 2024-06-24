<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\Candidat;
use App\Models\CandidatAttribute;
use App\Models\Odcuser;
use Hamcrest\Type\IsString;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCandidats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     // What to type in the line-command for running the command
    protected $signature = 'sync:candidats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for fetching all the candidates from the api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Syncing candidates from api ...');
        // $jsonCandidatsAWS = base_path('aws.json') ;
        // $candidatsData = json_decode(file_get_contents($jsonCandidatsAWS));
        $url = env('API_URL');

        // Fetching all the _id for each event
        $activites = Activite::pluck('_id')->toArray();

        $fetchCount = 1;

        // Browsing amoung different _id events
        foreach ($activites as $key => $value) {
            $this->info("Fetching the api url for event $fetchCount");

            // Sending the fetch request with the _id for each event
            $queryEvent = Http::timeout(10000)->get("$url/events/show/$value");

            // Checking if the request succeeded
            if ($queryEvent->successful()) {
                $this->info("Finished fetch $fetchCount");

                // If request succeeded, we store the result in json format
                $data = $queryEvent->object();

                // We access the "data" property
                $candidats = $data->data;

                // variable for counting each candidate saving
                $e = 1;

                // Browsing all the api result data 
                foreach ($candidats as $candidat) {
                    
                    // Checking if both a odcuser and an event are in the result from api
                    $odcuser = Odcuser::where('_id', $candidat->user->_id)->first();
                    $activite = Activite::where('_id', $candidat->event->_id)->first();
                    
                    // if they exist
                    if ($odcuser && $activite) {
                        $this->info("The odcuser and the activity exist in the fetch response, making the request...");
                        
                        //! Creating and updating
                        $candidatInfo = [
                            'odcuser_id' => $odcuser->id,
                            'activite_id' => $activite->id,
                            'status' => 1
                        ];

                        $this->info("Creating the candidate $e ...");

                        // Else we create it
                        $candidate = Candidat::firstOrCreate($candidatInfo);
                        $this->info("Candidate $e created successfully.");
                        
                        foreach ($candidat->formRegistrationData->inputs as $key => $value) {
                            $candidateAttributes = [
                                '_id' => $candidat->formRegistrationData->inputs[$key]->_id,
                                'label' => $candidat->formRegistrationData->inputs[$key]->translations->fr->input->label,
                                
                                'value' => (is_string($candidat->formRegistrationData->inputs[$key]->value)) ? ($candidat->formRegistrationData->inputs[$key]->value) : "",
                                'candidat_id' => $candidate->id
                            ];
                            $this->info("Creating the candidate attribute...");

                            try {
                                CandidatAttribute::firstOrCreate($candidateAttributes);
                            } catch (\Throwable $e) {
                                print_r($e) ;
                            }

                            $this->info("Candidate attribute created successfully" . $candidateAttributes['label'] . "!");
                        }
                        


                    }
                    $e++;
                }
                $this->info("Data synced successfully");
            } else {
                $this->info("Failed to retrieve candidates data ! Please retry !");
            }
            // Increasing the variable for counting the fetch operations
            $fetchCount++;
        }
        $this->info("Operation succeded with error code 0.");
    }
}
