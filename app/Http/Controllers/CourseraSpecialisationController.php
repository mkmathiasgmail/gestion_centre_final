<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CourseraSpecialisation;

class CourseraSpecialisationController extends Controller
{
    public function import_specialisations()
    {
        
        return view('coursera.import_specialisations');
    }





    public function import_specialisations_csv(Request $request)
    {
       
        try {
            $request->validate([
                'import_csv' => 'required|mimes:csv',
            ]);
            //read csv file and skip data
            $file = $request->file('import_csv');
            $handle = fopen($file->path(), 'r');
    
            //skip the header row
            fgetcsv($handle);
    
            $chunksize = 25;
            while(!feof($handle))
            {
                $chunkdata = [];
    
                for($i = 0; $i<$chunksize; $i++)
                {
                    $data = fgetcsv($handle);
                    if($data === false)
                    {
                        break;
                    }
                    $chunkdata[] = $data; 
                }
    
                $this->getchunkdata($chunkdata);
            }
            fclose($handle);
    
            return redirect()->route('import.specialisations')->with('success', 'Données importées avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('import.specialisations')->with('error', "Une érreur s'est produite");
        }
    }




    public function getchunkdata($chunkdata)
    {
        foreach($chunkdata as $column){
                
              $email = $column[1];
              $specialisaton_name = $column[3];
              $specialisaton_slug = $column[4];
              
              $university = $column[5];
              $enrollement_time = $column[6];
              $last_specialisation_activity = $column[7];
              $completed_courses = $column[8];
              $courses_in_specialisation = $column[9];
              $completed = $column[10];
              $removed_from_program = $column[11];
              $enrollment_source = $column[14];
              $specialization_completion_time = $column[15];
              $specialization_certificate_url = $column[16];

            //create new import


            $myImport = CourseraSpecialisation::create(

                [
                    "email"=> $email,
                    'specialisaton_name' => $specialisaton_name,
                    'specialisaton_slug' => $specialisaton_slug,
                    'university' => $university,
                    'enrollement_time' => Carbon::parse($enrollement_time),

                    'last_specialisation_activity' => Carbon::parse($last_specialisation_activity),
                    'completed_courses' => $completed_courses,
                    'courses_in_specialisation' => $courses_in_specialisation,
                    'completed' => $completed,
                    'removed_from_program'=> $removed_from_program,
                    'enrollment_source'=> $enrollment_source,
                    'specialization_completion_time'=> Carbon::parse($specialization_completion_time),
                    'specialization_certificate_url'=> $specialization_certificate_url,
                ]
            );
        }
    }
}
