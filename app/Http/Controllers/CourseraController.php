<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CourseraUsage;
use App\Models\CourseraMember;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CourseraSpecialisation;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CourseraController extends Controller
{
    public function rapport_invitation()
    {
        $membersMonths = CourseraMember::selectRaw('MONTH(join_date) as month, COUNT(*) as count')
            ->whereYear('join_date', date('Y'))
            ->groupBy('month')->orderBy('month')->get();

        $labels = [];
        $mydata = [];
        $colors = [
            '#FF6384',
            '#36A2EB',
            '#c9625b',
            '#cf72fa',
            '#f83d3d',
            '#fa43cc',
            '#ADD478',
            '#fcc737',
            '#ADD813',
            '#36d4fc',
            '#c92daf',
            '#FF7890'
        ];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($membersMonths as $member) {
                if ($member->month == $i) {
                    $count = $member->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($mydata, $count);
        }

        $datasets = [
            [
                'label' => "member join by month",
                'data' => $mydata,
                'backgroundColor' => $colors
            ]
        ];


        //MEMBERS___________________________________________
        $coursera_members = DB::table('coursera_members')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when member_state = 'MEMBER' then 1 end) as members")
            ->selectRaw("count(case when member_state = 'INVITED' then 1 end) as invites")
            ->first();

        $acceptInvitation = CourseraMember::where('member_state', 'MEMBER')->get();
        $noAcceptInvitation = CourseraMember::where('member_state', 'INVITED')->get();
        $allMembers = CourseraMember::all();

        //USAGES__________________________________________________
        $coursera_usages = DB::table('coursera_usages')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when completed = 'Yes' then 1 end) as completed")
            ->selectRaw("count(case when completed = 'No' then 1 end) as noCompleted")
            ->first();

        $getCompletedUsages = CourseraUsage::join('coursera_members as cmem', 'cmem.id', '=', 'coursera_usages.coursera_member_id')->select([
            'cmem.name',
            'cmem.email',
            'coursera_usages.university',
            'coursera_usages.course_slug',
        ])->where('completed', 'Yes')->get();
        $uncompletedUsages = CourseraUsage::where('completed', 'NO')->get();
        $allUsages = CourseraUsage:: all();

        //Specialisation__________________________________________
        $allSpecialisations = CourseraSpecialisation::select('specialisaton') // Remplacez par le nom de la colonne que vous souhaitez
        ->distinct()
        ->get();
        $specialisationsCount = DB::table('coursera_specialisations')
        ->distinct()
        ->count('specialisaton');

        $completedSpecialisations = CourseraSpecialisation::where('completed', 'Yes')->count();

        $uncompletedSpecialisations = CourseraSpecialisation::where('completed', 'NO')->count();

        $licence_en_cours = CourseraUsage::leftJoin('coursera_members as cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
            ->where('coursera_usages.removed_from_program', 'Yes')
            ->select('cm.email', 'cm.name', 'coursera_usages.course', 'coursera_usages.course_slug', 'coursera_usages.university')
            ->get();

        $licence_en_cours_count = $licence_en_cours->count();

        $certificats = CourseraUsage::leftJoin('coursera_members as cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
            ->where('course_certificate_url', '!=', '')
            ->select('cm.name', 'cm.email', 'coursera_usages.university', 'coursera_usages.course', 'coursera_usages.course_slug')
            ->get();

        $certificat_count = $certificats->count();

        $thirtyDaysAgo = Carbon::now()->subDays(30);


        $apprenants_30day = CourseraMember::select('coursera_members.name', 'coursera_members.email', 'cu.university', 'cu.course', 'cu.course_slug', 'cu.course_certificate_url')
            ->leftJoin('coursera_usages as cu', 'coursera_members.id', '=', 'cu.coursera_member_id')
            ->where('coursera_members.join_date', '>=', Carbon::now()->subDays(30))
            ->where(function ($query) {
                $query->where('cu.course_certificate_url', '=', '')
                    ->orWhereNull('cu.course_certificate_url');
            })
            ->get();
        $apprenants_30day_count = $apprenants_30day->count();


        $non_inscrit_cours = CourseraMember::select('coursera_members.name', 'coursera_members.email', 'cu.university', 'cu.course', 'cu.course_slug', 'cu.course_certificate_url')
            ->leftJoin('coursera_usages as cu', 'coursera_members.id', '=', 'cu.coursera_member_id')
            ->where('coursera_members.join_date', '>', Carbon::now()->subDays(7))
            ->where('coursera_members.member_state', '=', 'INVITED')
            ->get();

        $non_inscrit_cours_count = $non_inscrit_cours->count();

        $last_activity = CourseraMember::select([
            'name', 'email',
            'join_date',
            'latest_program_activity_date'

        ])->where('latest_program_activity_date', '>', '2024-09-01')->get();

        $last_activity_count = $last_activity->count();


        $taux_utilisation = CourseraUsage::select('cm.email', 'cm.name', 'coursera_usages.university', 'coursera_usages.course', 'coursera_usages.course_slug', 'coursera_usages.last_course_activity')
            ->leftJoin('coursera_members AS cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
            ->where('coursera_usages.removed_from_program', '=', 'Yes')
            ->where('coursera_usages.last_course_activity', '>', Carbon::now()->subDays(21)) // Assurez-vous que 'last_course_activity' est dans 'coursera_usages'
            ->get();
        $taux_count = $taux_utilisation->count();
        $taux = ($taux_count * 100) / 125;


        return view('coursera.coursera_rapports', compact(
            'datasets',
            'labels',
            "coursera_members",
            "specialisationsCount",
            "coursera_usages",
            "completedSpecialisations",
            "uncompletedSpecialisations",
            "uncompletedUsages",
            "getCompletedUsages",
            "licence_en_cours",
            "licence_en_cours_count",
            "certificats",
            "certificat_count",
            "apprenants_30day",
            "apprenants_30day_count",
            "non_inscrit_cours",
            "non_inscrit_cours_count",
            "last_activity",
            "last_activity_count",
            "taux_utilisation",
            "taux_count",
            "taux",
            "allMembers",
            "allUsages",
            "allSpecialisations"
        ));
    }
    public function licence_encours()
    {
        $licence_en_cours = CourseraUsage::leftJoin('coursera_members as cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
            ->where('coursera_usages.removed_from_program', 'Yes')
            ->select('cm.email', 'cm.name', 'coursera_usages.course', 'coursera_usages.course_slug', 'coursera_usages.university')
            ->get();

        // Vérifie si des membres ont été trouvés
        if ($licence_en_cours->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'University');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Invitation_Date');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($licence_en_cours as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->course)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->university)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Coursera_Invitation.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function memmbre_30day()
    {
        $apprenants_30day = CourseraMember::select('coursera_members.name', 'coursera_members.email', 'cu.university', 'cu.course', 'cu.course_slug', 'cu.course_certificate_url')
        ->leftJoin('coursera_usages as cu', 'coursera_members.id', '=', 'cu.coursera_member_id')
        ->where('coursera_members.join_date', '>=', Carbon::now()->subDays(30))
            ->where(function ($query) {
                $query->where('cu.course_certificate_url', '=', '')
                    ->orWhereNull('cu.course_certificate_url');
            })
            ->get();
        // Vérifie si des membres ont été trouvés
        if ($apprenants_30day->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'University');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Invitation_Date');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($apprenants_30day as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->course)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->university)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Invitater.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function certificat_obtenue()
    {
        $certificats = CourseraUsage::leftJoin('coursera_members as cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
        ->where('course_certificate_url', '!=', '')
            ->select('cm.name', 'cm.email', 'coursera_usages.university', 'coursera_usages.course', 'coursera_usages.course_slug')
            ->get();

        // Vérifie si des membres ont été trouvés
        if ($certificats->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'University');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Invitation_Date');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($certificats as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->course)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->university)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Invitater.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function non_inscrit_cours()
    {
        $non_inscrit_cours = CourseraMember::select('coursera_members.name', 'coursera_members.email', 'cu.university', 'cu.course', 'cu.course_slug', 'cu.course_certificate_url')
        ->leftJoin('coursera_usages as cu', 'coursera_members.id', '=', 'cu.coursera_member_id')
        ->where('coursera_members.join_date', '>', Carbon::now()->subDays(7))
            ->where('coursera_members.member_state', '=', 'INVITED')
            ->get();

        // Vérifie si des membres ont été trouvés
        if ($non_inscrit_cours->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'University');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Invitation_Date');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($non_inscrit_cours as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->course)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->university)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Invitater.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function taux_utilisation()
    {
        $taux_utilisation = CourseraUsage::select('cm.email', 'cm.name', 'coursera_usages.university', 'coursera_usages.course', 'coursera_usages.course_slug', 'coursera_usages.last_course_activity')
        ->leftJoin('coursera_members AS cm', 'cm.id', '=', 'coursera_usages.coursera_member_id')
        ->where('coursera_usages.removed_from_program', '=', 'Yes')
        ->where('coursera_usages.last_course_activity', '>', Carbon::now()->subDays(21)) // Assurez-vous que 'last_course_activity' est dans 'coursera_usages'
            ->get();

        // Vérifie si des membres ont été trouvés
        if ($taux_utilisation->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'University');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Invitation_Date');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($taux_utilisation as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->course)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->university)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Invitater.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function last_activity()
    {
        $last_activity = CourseraMember::where('latest_program_activity_date', '>', '2024-09-01')->get();

        // Vérifie si des membres ont été trouvés
        if ($last_activity->isEmpty()) {
            return response()->json(['message' => 'Aucune invitation trouvée.'], 404);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('A1', 'Name');
        $worksheet->getStyle('A1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('B1', 'Email');
        $worksheet->getStyle('B1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('C1', 'Date de debut');
        $worksheet->getStyle('C1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        $worksheet->setCellValue('D1', 'Date activité');
        $worksheet->getStyle('D1')
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('D3D3D3'));

        // Définition des bordures
        $worksheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $row = 2;

        foreach ($last_activity as $member) {
            $worksheet->setCellValue('A' . $row, $member->name)
                ->getStyle('A' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('B' . $row, $member->email)
                ->getStyle('B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('C' . $row, $member->join_date)
                ->getStyle('C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $worksheet->setCellValue('D' . $row, $member->latest_program_activity_date)
                ->getStyle('D' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }

        // On crée le fichier Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = "Invitater.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        // On renvoie le fichier Excel au navigateur
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

}
