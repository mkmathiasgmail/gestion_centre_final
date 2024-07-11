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
        // Inform the user that the syncing process has started
        $this->info("Syncing odcusers...");

        // Get the API URL from the environment variables
        $url = env('API_URL');

        // Send a GET request to the API to retrieve active users
        $queryCandidats = Http::timeout(10000)->get("$url/users/active");
        
        // Check if the API request was successful
        if ($queryCandidats->successful()) {
            $this->info("The response has succeeded, trying to process it...");

            // Convert the API response to an object
            $data = $queryCandidats->object();
            // Check if the API returned an error code (401: Unauthorized)
            if (isset($data->code) && $data->code === 401) {
                $this->error("Token expired, refreshing...");

                // Refresh the token and retry the request
                $this->refreshToken();
                // Retry the API request with the refreshed token
                $queryCandidats = Http::timeout(10000)->get("$url/users/active");
                if ($queryCandidats->successful()) {
                    $data = $queryCandidats->object();
                } else {
                    $this->error('Failed to retrieve data from API after token refresh.');
                    exit;
            }
            }

            // Get the list of odcusers from the API response
            $odcusers = $data->data;

            // Initialize a counter for the number of users processed
            $i = 1;

            // Loop through each odcuser
            foreach ($odcusers as $person) {
                // Check if the user already exists in the database
                $existingUser = Odcuser::where('email', $person->email)->first();
                
                // Parse the birth date, creation date, and update date from the API response
                $birth_date = Carbon::parse($person->birthDay);
                $createdAt = Carbon::parse($person->createdAt);
                $updatedAt = Carbon::parse($person->updatedAt);
                
                // Parse the last connection date from the API response
                $last_connection = Carbon::parse($person->last_connection);

                // Check if the 'detailProfession' property is set and not null
                if (isset($person->detailProfession)) {
                    // If it's set, encode it using json_encode()
                    $detailProfessionValue = json_encode($person->detailProfession);
                } else {
                    // If it's not set or null, provide a default value (empty string, empty array, etc.)
                    $detailProfessionValue = json_encode(""); // Or json_encode([]) for an empty array
                }

                // Collect the user data from the API response
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

                // If the user already exists, update their data
                if (isset($existingUser)) {
                    $this->info("User $i already saved, checking available update...");
                    $existingUser->update($userData);
                    $this->info("User $i updated successfully: " . $person->email);
                } else {
                    // If the user doesn't exist, create a new one
                    $this->info("User $i not found, creating him...");
                    Odcuser::create($userData);
                    $this->info("User $i created successfully: " . $person->email);
                }

                // Increment the user counter
                $i++;
            }

            // Inform the user that the syncing process was successful
            $this->info("Data synced successfully, exit code : 0");
        } else {
            // Inform the user that the API request failed
            $this->error('Failed to retrieve data from API.');
        }
    }
        
    private function refreshToken()
    {
        $url = env('API_URL');
        // Implement your token refresh logic here
        $response = Http::timeout(10000)->post("$url/generer/token");
    }
}
