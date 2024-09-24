<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseraUsage;
use App\Models\CourseraMember;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CourseraSpecialisation;

class CourseraController extends Controller
{
    public function rapport_invitation()
    {
       

        $specialisations = CourseraSpecialisation::where('specialization_completion_time', '<', now())->count();


        $usagesEncourrs = DB::table('coursera_usages')
            ->where('class_start_time', '<=', now())
            ->where('class_end_time', '>=', now())->count();


        return view('coursera.coursera_rapports', compact(
            'datasets',
            'labels',
            "coursera_members",
            "specialisationsCount",
            "coursera_usages",
            "specialisations",
            "completedSpecialisations",
            "uncompletedSpecialisations",
            "deletedUsages",
            "completedUsages",
            "uncompletedUsages",
            "getCompletedUsages"
        ));
    }
    public function chart_cursera(){
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

    }
    public function complete_course(){
        $coursera_usages = DB::table('coursera_usages')
        ->selectRaw('count(*) as total')
        ->selectRaw("count(case when completed = 'Yes' then 1 end) as completed")
        ->selectRaw("count(case when completed = 'No' then 1 end) as noCompleted")
        ->first();

        $completedSpecialisations = CourseraSpecialisation::where('completed', 'Yes')->count();
        $completedUsages = CourseraUsage::where('completed', 'Yes')->count();
        $getCompletedUsages = CourseraUsage::where('completed', 'Yes')->paginate(25);
        $uncompletedSpecialisations = CourseraSpecialisation::where('completed', 'NO')->count();
        $uncompletedUsages = CourseraUsage::where('completed', 'NO')->count();
    }
    public function gestion_cursera(){
        $coursera_members = DB::table('coursera_members')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when member_state = 'MEMBER' then 1 end) as members")
            ->selectRaw("count(case when member_state = 'INVITED' then 1 end) as invites")
            ->first();

        $specialisationsCount = DB::table('coursera_specialisations')
        ->select('specialisaton')->count();

        $deletedUsages = CourseraUsage::where('removed_from_program', 'Yes')->count();

    }
}
