<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseraMember;
use Illuminate\Support\Carbon;

class CourseraMemberController extends Controller
{


    public function import_members()
    {
        
        return view('coursera.import_members');
    }



    public function import_members_csv(Request $request)
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
    
            return redirect()->route('import.members')->with('success', 'Data has been added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('import.members')->with('error', "Une érreur s'est produite");
        }
    }


    public function getchunkdata($chunkdata)
    {
        foreach($chunkdata as $column){
             $name = $column[0];
             $email = $column[1];
             $external_id = $column[2];
             $enrolled_courses = $column[5];
             $completed_courses = $column[6];
             $member_state = $column[7];
             $join_date = $column[8];
             $invitation_date = $column[9];
             $latest_program_activity_date = $column[10];


             //$existingMember = CourseraMember::where('email', $email)->first();

             $myImport = CourseraMember::updateOrCreate(
                ['email' => $email],
                [
                    'external_id' => $external_id,
                    'name' => $name,
                    'enrolled_courses' => $enrolled_courses,
                    'completed_courses' => $completed_courses,
                    'member_state' => $member_state,
                    'join_date' => Carbon::parse($join_date),
                    'invitation_date' => Carbon::parse($invitation_date),
                    'latest_program_activity_date' => Carbon::parse($latest_program_activity_date)
                ]
            );
        }
    }
}
