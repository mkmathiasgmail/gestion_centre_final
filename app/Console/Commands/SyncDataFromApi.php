<?php

namespace App\Console\Commands;

use App\Models\Test;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncDataFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:data';

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

        // Paramètres de pagination
        $page = 1;
        $perPage = 10; // Nombre d'éléments par page

        // Envoi de la requête GET à l'API avec les paramètres de pagination
        $apiResponse = Http::timeout(1500)->get('http://10.252.252.54:8000/api/users/active', [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        // Vérification si la requête a réussi
        if ($apiResponse->successful()) {
            // Récupération des données JSON
            $apiData = $apiResponse->json();

            $data = $apiData['data'];
            foreach ($data as $person) {
                // Vérification si les données existent déjà dans la base de données
                $existingData = Test::where('firstName', $person->firstName)
                    ->where('lastName', $person->lastName)
                    ->first();

                if ($existingData) {
                    // Mise à jour des données existantes
                    $existingData->update([
                        'firstName' => $person->firstName,
                        'lasttName' => $person->lastName,
                        'gender' => $person->gender,
                    ]);
                } else {
                    // Insertion de nouvelles données
                    Test::create([
                        'firstName' => $person->firstName,
                        'lastName' => $person->lastName,
                        'gender' => $person->gender,
                    ]);
                }
            }

            $this->info('Data synced successfully.');
        } else {
            $this->error('Failed to retrieve data from API.');
        }
    }
}
