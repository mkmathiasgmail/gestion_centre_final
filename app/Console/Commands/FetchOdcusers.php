<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\Candidat;
use App\Models\Odcuser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchOdcusers extends Command
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
    protected $description = 'Sync odcusers from API and storing them into database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Syncing odcusers...");
        $url = env('API_URL');
        $queryCandidats = Http::timeout(10000)->get("$url/users/active") ;
        
        // Chemin absolu vers le fichier JSON contenant les odcusers
        //$jsonOdcusers = base_path('odcusers_from_api.json');

        //Read JSON data from file
        //$jsonData = file_get_contents($jsonOdcusers);

        //Decode JSON data
        //$apiData = json_decode($jsonData);

        // Vérification si la requête a réussi
        // if ($apiData !== null) {
        if ($queryCandidats->successful()) {
            $this->info("The response has succeeded, trying to process it...");
            $this->info("Converting it into object...");

            $data = $queryCandidats->object() ;
            if (isset($data->code) && $data->code == 401) {
                $this->error("Your token has expired, please reset it.");
                exit ;
            }
            // We access the "data" object
            $odcusers = $data->data;

            $i = 1 ;
            // We browse all the odcusers
            foreach ($odcusers as $person) {
                // Vérification si les données existent déjà dans la base de données
                
                $existingUser = Odcuser::where('email', $person->email)->first();
                
                $birth_date = Carbon::parse($person->birthDay);
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
                    'first_name' => $person->firstName,
                    'last_name' => $person->lastName,
                    'email' => $person->email,
                    'password' => $person->password,
                    'gender' => $person->gender,
                    'birth_date' => $birth_date,
                    'linkedin' => isset($person->linkedIn) ? $person->linkedIn : "",
                    'profession' => isset($person->profession) ? (json_encode($person->profession)) : "",
                    'odc_country' => isset($person->odcCountry) ? (json_encode($person->odcCountry)) : "",
                    'role' => $person->role,
                    'is_active' => $person->isActive,
                    'hashtags' => isset($person->hashtags) ? (json_encode($person->hashtags)) : "",
                    'coding_school' => isset($person->codingSchool) ? ($person->codingSchool) : "",
                    'fablab_solidaire' => isset($person->fabLabSolidaire) ? ($person->fabLabSolidaire) : "",
                    'training' => isset($person->training) ? ($person->training) : "",
                    'internship' => isset($person->internship) ? ($person->internship) : "",
                    'event' => $person->event,
                    'subscribe' => isset($person->subscribe) ? $person->subscribe : "",
                    'newsletters' => isset($person->newsletters) ? json_encode($person->newsletters) : "",
                    'topics' => isset($person->topics) ? (json_encode($person->topics)) : "",
                    'last_connection' => $last_connection,
                    '_id' => $person->_id,
                    'detail_profession' => isset($detailProfessionValue) ? ($detailProfessionValue) : "",
                    'createdAt' => $createdAt, 
                    'updatedAt' => $updatedAt,
                    'picture' => isset($person->picture) ? ($person->picture) : "",
                    'user_cv' => isset($person->userCV) ? ($person->userCV) : "",
                ];

                if (isset($existingUser)) {
                    $this->info("User $i already saved, checking available update...");
                    // Update the existing user
                    $existingUser->update($userData);
                    $this->info("User $i updated successfully: " . $person->email);
                } else {
                    $this->info("User $i not found, creating him...");
                    // Insertion de nouvelles données
                    Odcuser::create($userData);
                    $this->info("User $i created successfully: " . $person->email);
                }

                $this->info("Data synced successfully, exit code : 0");
                $i++;
            }
        } else {
            $this->error('Failed to retrieve data from API.');
        }

        
    }
}
