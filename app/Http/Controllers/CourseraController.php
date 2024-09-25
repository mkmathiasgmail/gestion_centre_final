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

        //USAGES__________________________________________________
        $coursera_usages = DB::table('coursera_usages') 
        ->selectRaw('count(*) as total')
        ->selectRaw("count(case when completed = 'Yes' then 1 end) as completed")
        ->selectRaw("count(case when completed = 'No' then 1 end) as noCompleted")
        ->first();

        $getCompletedUsages = CourseraUsage::where('completed', 'Yes')->get();
        $uncompletedUsages = CourseraUsage::where('completed', 'NO')->get();
        $deletedUsages = CourseraUsage::where('removed_from_program', 'Yes')->count();


        //Specialisation__________________________________________

        $specialisationsCount = DB::table('coursera_specialisations')
                            ->select('specialisaton_name')->count();

        $completedSpecialisations = CourseraSpecialisation::where('completed', 'Yes')->count();
       
        $uncompletedSpecialisations = CourseraSpecialisation::where('completed', 'NO')->count();


        return view('coursera.coursera_rapports', compact(
            'datasets',
            'labels',
            "coursera_members",
            "specialisationsCount",
            "coursera_usages",
            "completedSpecialisations",
            "uncompletedSpecialisations",
            "deletedUsages",
            "uncompletedUsages",
            "getCompletedUsages"
        ));

}
}
