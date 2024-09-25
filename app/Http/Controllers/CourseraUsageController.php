<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseraUsage;
use App\Models\CourseraMember;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CourseraUsageController extends Controller
{
    public function import_usages()
    {

        return view('coursera.import_usages');
    }





    public function import_usages_csv(Request $request)
    {
        try {
            $request->validate([
                'import_csv' => 'required|mimes:csv',
            ]);

            // Lire le fichier CSV et ignorer l'en-tête
            $file = $request->file('import_csv');
            $handle = fopen($file->path(), 'r');

            // Ignorer la ligne d'en-tête
            fgetcsv($handle);

            // Récupérer tous les emails de la table members
            $memberEmails = CourseraMember::pluck('email')->toArray();

            $chunksize = 25;
            while (!feof($handle)) {
                $chunkdata = [];

                for ($i = 0; $i < $chunksize; $i++) {
                    $data = fgetcsv($handle);
                    if ($data === false) {
                        break;
                    }
                    $chunkdata[] = $data;
                }

                $this->getchunkdata($chunkdata, $memberEmails);
            }
            fclose($handle);

            return redirect()->route('import.usages')->with('success', 'Les données ont été insérées avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('import.usages')->with('error', "Une erreur s'est produite : " . $e->getMessage());
        }
    }

    public function getchunkdata($chunkdata, $memberEmails)
    {
        foreach ($chunkdata as $column) {
            $email = $column[1];

            // Vérifier si l'email existe dans la table members
            if (!in_array($email, $memberEmails)) {
                continue; // Passer cet enregistrement si l'email n'est pas trouvé
            }

            // Récupérer l'ID du membre correspondant à l'email
            $memberId = CourseraMember::where('email', $email)->value('id');

            // Extraire les autres données du CSV
            $course_name = $column[3];
            $course_id = $column[4];
            $course_slug = $column[5];
            $university = $column[6];

            $enrollment_time = $column[7];
            $class_start_time = $column[8];
            $class_end_time = $column[9];

            $last_course_activity = $column[10];
            $overall_progress = $column[11];
            $estimated_learning_hours = $column[12];

            $completed = $column[13];
            $removed_from_program = $column[14];
            $enrollment_source = $column[17];
            $completion_time = $column[18];
            $course_grade = $column[19];
            $course_certificate_url = $column[20];
            $course_type = $column[22];

            // Insérer dans la table CourseraUsage
            $check = CourseraUsage::Create([
                "email" => $email,
                'course' => $course_name,
                'course_id' => $course_id,
                'course_slug' => $course_slug,
                'university' => $university,
                'enrollement_time' => Carbon::parse($enrollment_time),
                'class_start_time' => Carbon::parse($class_start_time),
                'class_end_time' => Carbon::parse($class_end_time),
                'last_course_activity' => Carbon::parse($last_course_activity),
                'overall_progress' => $overall_progress,
                'estimated_learning_hours' => $estimated_learning_hours,
                'completed' => $completed,
                'removed_from_program' => $removed_from_program,
                'enrollment_source' => $enrollment_source,
                'completion_time' => Carbon::parse($completion_time),
                'course_grade' => $course_grade,
                'course_certificate_url' => $course_certificate_url,
                'coursera_member_id' => $memberId // Ajouter l'ID du membre ici
            ]);
        }
    }
}
