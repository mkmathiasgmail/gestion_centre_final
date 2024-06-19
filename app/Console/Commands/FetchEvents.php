<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Hashtag;
use App\Models\Activite;
use App\Models\Categorie;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:events';

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
            $url = env('API_BASE_URL');
            $response = Http::timeout(100000)->get("http://10.252.252.6:8000/api/events/active");

            if ($response->successful()) {
                $workshops = $response->json()['data'];
                $this->info('Fetch Events data from API and store in database........');
                $i = 1 ;
                foreach ($workshops as $workshopData) {
                    $existingWorkshop = Activite::where('updated_At', $workshopData['updatedAt'])
                        ->where('startDate', $workshopData['startDate'])
                        ->first();

                    if ($existingWorkshop) {
                        $this->info("Workshop already exists: " . $workshopData['translations']['fr']['title']);


                        continue;
                    } else {
                        $categoryName = isset($workshopData['categories'][0]) ? $workshopData['categories'][0] : "";
                        $category = Categorie::firstOrCreate(['categorie' => $categoryName]);


                        $end = Carbon::parse($workshopData['endDate']);
                        $start = Carbon::parse($workshopData['startDate']);
                        $startD = Carbon::parse($workshopData['createdAt']);
                        $upD = Carbon::parse($workshopData['updatedAt']);

                        $activites = Activite::create([
                            'title' => $workshopData['translations']['fr']['title'],
                            'content' => json_encode($workshopData['translations']['fr']['content']),
                            'categorie_id' => $category->id,
                            'startDate' => $start,
                            'typeEvent' => '',
                            'status' => $workshopData['status'],
                            '_id' => $workshopData['_id'],
                            'publishStatus' => $workshopData['publishStatus'],
                            'showInSlider' => $workshopData['showInSlider'],
                            'send' => $workshopData['send'],
                            'form' => isset($workshopData['form'])? $workshopData['form']:"",
                            'miniatureColor' => isset($workshopData['miniatureColor'])? $workshopData['miniatureColor']:'' ,
                            'showInCalendar' => $workshopData['showInCalendar'],
                            'liveStatus' => $workshopData['liveStatus'],
                            'bookASeat' => isset($workshopData['bookASeat'])? $workshopData['bookASeat']:false ,
                            'isEvents' => $workshopData['isEvents'],
                            'createdAt' => $startD,
                            'updatedAt' => $upD,
                            'creator' => json_encode($workshopData['creator']) ,
                            'endDate' => $end,
                            'location' => $workshopData['location'],
                        ]);

                        foreach ($workshopData['hashtags'] as $hashtagName) {
                            $hashtag = Hashtag::firstOrCreate(['hashtag' => $hashtagName]);
                            $activites->hashtag()->attach($hashtag->id);
                        }
                    }
                    $this->info("Synchronisation {$i} ");
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
