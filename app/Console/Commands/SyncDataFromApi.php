<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Odcuser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncDataFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:odcusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync data from API to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Start syncing data from API to database");
        $url = env('API_URL');
        $apiResponse = Http::timeout(10000)->get("$url/users/active") ;
        
        // Chemin absolu vers le fichier JSON contenant les odcusers
        //$jsonOdcusers = base_path('odcusers_from_api.json');

        //Read JSON data from file
        //$jsonData = file_get_contents($jsonOdcusers);

        //Decode JSON data
        //$apiData = json_decode($jsonData);

        // Vérification si la requête a réussi
        // if ($apiData !== null) {
        if ($apiResponse->successful()) {
            $apiData = $apiResponse->object() ;
            $data = $apiData->data;
            $i = 1 ;
            foreach ($data as $person) {
                // Vérification si les données existent déjà dans la base de données
                $existingUser = Odcuser::where('email', $person->email)->first();
                
                $birthDay = Carbon::parse($person->birthDay);
                $createdAt = Carbon::parse($person->createdAt);
                $updatedAt = Carbon::parse($person->updatedAt);
                $last_connection = Carbon::parse($person->last_connection);
                // Check if the 'detailProfession' property is set and not null
                if (isset($person->detailProfession)) {
                    // If it's set, encode it using json_encode()
                    $detailProfessionValue = json_encode($person->detailProfession);
                } else {
                    // If it's not set or null, provide a default value (empty string, empty array, etc.)
                    $detailProfessionValue = json_encode(""); // Or json_encode([]) for an empty array
                }

                // Collect the user data
                $userData = [
                    'firstName' => $person->firstName,
                    'lastName' => $person->lastName,
                    'email' => $person->email,
                    'password' => $person->password,
                    'gender' => $person->gender,
                    'birthDay' => $birthDay,
                    'linkedIn' => isset($person->linkedIn) ? $person->linkedIn : "",
                    'profession' => json_encode($person->profession),
                    'odcCountry' => json_encode($person->odcCountry),
                    'role' => $person->role,
                    'isActive' => $person->isActive,
                    'hashtags' => json_encode($person->hashtags),
                    'codingSchool' => $person->codingSchool,
                    'fabLabSolidaire' => $person->fabLabSolidaire,
                    'training' => $person->training,
                    'internship' => $person->internship,
                    'event' => $person->event,
                    'subscribe' => $person->subscribe,
                    'newsletters' => json_encode($person->newsletters),
                    'topics' => json_encode($person->topics), // Assuming 'topics' is an array
                    'last_connection' => $last_connection,
                    '_id' => $person->_id,
                    'detailProfession' => $detailProfessionValue,
                    'createdAt' => $createdAt, // Assuming this is in the JSON data
                    'updatedAt' => $updatedAt, // Assuming this is in the JSON data
                    'picture' => isset($person->picture) ? $person->picture : "",
                    'userCV' => isset($person->userCV) ? $person->userCV : "",
                ];

                if ($existingUser) {
                    // Update the existing user
                    $existingUser->update($userData);
                    $this->info("User updated successfully: " . $person->email);
                } else {
                    // Insertion de nouvelles données
                    Odcuser::create($userData);
                    $this->info("User created successfully: " . $person->email);
                }

                $this->info("Data synced successfully : " . $i . "");
                $i++;
            }
        } else {
            $this->error('Failed to retrieve data from API.');
        }

        
    }
}
