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
    protected $signature = 'app:fetch-events';

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

            $this->info('Fetch Events data from API and store in database........');

            $url = env('API_URL');

            $response = Http::timeout("100000")->get("http://10.143.41.70:8000/2024/odc/public/api/events/active");

            if ($response->successful()) {
                $workshops = $response->json()['data'];

                $result = array_reverse($workshops);


                $i = 1;
                foreach ($result as $workshopData) {
                    $end = Carbon::parse($workshopData['endDate']);
                    $start = Carbon::parse($workshopData['startDate']);
                    $startD = Carbon::parse($workshopData['createdAt']);
                    $upD = Carbon::parse($workshopData['updatedAt']);

                    $existingEvent = Activite::where('updatedAt', $upD)->first();


                    if ($existingEvent) {


                        $this->info("Workshop already exists: " . $workshopData['translations']['fr']['title']);
                    } else {
                        $categoryName = isset($workshopData['categories'][0]) ? $workshopData['categories'][0] : "";
                        $category = Categorie::firstOrCreate(['categorie' => $categoryName]);






                        $activites = Activite::firstOrCreate([
                            'title' => $workshopData['translations']['fr']['title'],
                            'content' => json_encode($workshopData['translations']['fr']['content']),
                            'categorie_id' => $category->id,
                            'startDate' => $start,
                            'status' => $workshopData['status'],
                            '_id' => $workshopData['_id'],
                            'publishStatus' => $workshopData['publishStatus'],
                            'showInSlider' => $workshopData['showInSlider'],
                            'send' => $workshopData['send'],
                            'form_id' => rand(1,23),
                            'miniatureColor' => isset($workshopData['miniatureColor']) ? $workshopData['miniatureColor'] : '',
                            'showInCalendar' => $workshopData['showInCalendar'],
                            'liveStatus' => $workshopData['liveStatus'],
                            'bookASeat' => isset($workshopData['bookASeat']) ? $workshopData['bookASeat'] : false,
                            'isEvents' => $workshopData['isEvents'],
                            'createdAt' => $startD,
                            'updatedAt' => $upD,
                            'creator' => json_encode($workshopData['creator']),
                            'endDate' => $end,
                            'location' => isset($workshopData['location']) ? $workshopData['location'] : '',
                        ]);

                        foreach ($workshopData['hashtags'] as $hashtagName) {
                            $hashtag = Hashtag::firstOrCreate(['hashtag' => $hashtagName]);
                            $activites->hashtag()->attach($hashtag->id);
                        }
                    }
                    $this->info("Synchronisation {$i} ".$workshopData['translations']['fr']['title']);
                    $i++;
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
