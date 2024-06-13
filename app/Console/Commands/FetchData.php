<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Hashtag;
use App\Models\Activite;
use App\Models\Categorie;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-data';

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
        // Fetch data from the API
        try {

            $response = Http::timeout("100000")->get('http://10.252.252.16:8000/api/events/active');

            if ($response->successful()) {
                $workshops = $response->json()['data'];
                $this->info('Fetch Events data from API and store in database........');

                foreach ($workshops as $workshopData) {
                    $categoryName = $workshopData['categories'];
                    $category = Categorie::firstOrCreate(['categorie' =>json_encode(isset($categoryName->categories)?$categoryName->categories:"" ) ]);

                    $end= Carbon::parse($workshopData['endDate']);
                    $start=Carbon::parse($workshopData['startDate']);

                   $activites= Activite::create([
                        'title' => $workshopData['translations']['fr']['title'],
                        'content' => json_encode($workshopData['translations']['fr']['content']) ,
                        'categorie_id' =>$category->id,
                        'startDate' => $start,
                        'typeEvent' =>'',
                        'endDate' => $end,
                        'location' => $workshopData['location'],
                    ]);

                    foreach ($workshopData['hashtags'] as $hashtagName) {
                        $hashtag = Hashtag::firstOrCreate(['hashtag' => $hashtagName]);
                        $activites->hashtag()->attach($hashtag->id);
                    }
                }

                $this->info('Event data fetched and stored successfully.');
            } else {
                $this->error('Error fetching workshops data from API. Response status: ' . $response->status());
            }
        } catch (Exception $e) {
            // Handle any errors that occurred during the process
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
