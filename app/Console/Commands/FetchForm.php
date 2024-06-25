<?php

namespace App\Console\Commands;

use Exception;
use Carbon\Carbon;
use App\Models\Form;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-form';

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
        try {

            $this->info('Fetch Form data from API and store in database........');

            $url = env('API_URL');

            $response = Http::timeout("100000")->get("http://10.143.41.70:8000/2024/odc/public/api/forms");

            if ($response->successful()) {
                $workshops = $response->json()['data'];

                $result = array_reverse($workshops);


                $i = 1;
                foreach ($result as $workshopData) {

                    $startD = Carbon::parse($workshopData['createdAt']);
                    $upD = Carbon::parse($workshopData['updatedAt']);

                    $form = Form::firstOrCreate([
                        'name' => isset($workshopData['translations']['fr']['name']) ? $workshopData['translations']['fr']['name'] : "",
                        'description' => $workshopData['translations']['fr']['description'],
                        'inputs' => json_encode($workshopData['inputs']),
                        'type' => $workshopData['type'],
                        '_id' => $workshopData['_id'],
                        'deleted' => $workshopData['deleted'],
                        'status'=> $workshopData['status'],
                        'odcCountry' => $workshopData['odcCountry'],
                        'createdAt' => $startD,
                        'updatedAt' => $upD,

                    ]);



                    $this->info("Synchronisation {$i} ");
                    $i++;
                }
                $this->info('Form data fetched and stored successfully.');
            } else {
                $this->error('Error fetching form data from API. Response status: ' . $response->status());
            }
        } catch (Exception $e) {
            // Handle any errors that occurred during the process
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
