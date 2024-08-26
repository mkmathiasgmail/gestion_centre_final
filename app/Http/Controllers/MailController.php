<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Mail\SendingMail;
use App\Models\MailFailed;
use App\Models\ModelMail;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {        
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        Carbon::setLocale('fr');

        $subject = $request->input('subject');
        $activiteId = $request->input('activity');
        $message = $request->input('message');
        $model = $request->input('model-mail');
    
        $activite = Activite::where("id", $activiteId);
        if (!$activite) {
            return back()->with("error", "Activité non trouvée");
        }    

        $startDate = Carbon::parse($activite->first()->start_date)->translatedFormat('l d F Y');
        $endDate = Carbon::parse($activite->first()->end_date)->translatedFormat('l d F Y');

        $message = str_replace(['::activite', '::start_date', '::end_date'], [$activite->first()->title, $startDate, $endDate], $message);

        $mailUsersQuery = Odcuser::query();

        if ($request->input('activity') !== '') {
            if ($request->input('cible') === 'tout-le-monde'){
                $mailUsersQuery = Odcuser::query()->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->where("ca.activite_id", $activiteId);

            } elseif ($request->input('cible') === 'accepté'){
                $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.id', $activiteId)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.email');
    
            } elseif ($request->input('cible') === 'decline'){
                $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.id', $activiteId)
                    ->where('ca.status', 'decline')
                    ->select('odcusers.email');
    
            } elseif ($request->input('cible') === 'activité'){
                $act = $request->input('per-activity');
                $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.title', $act)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.email');
    
            } elseif ($request->input('cible') === 'age-cible'){
                $ageCondition = $request->input('age');
                if ($ageCondition === '>18') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(18))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');

                } elseif ($ageCondition === '<18') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '>', Carbon::now()->subYears(18))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');

                } elseif ($ageCondition === '>25') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(25))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');

                } elseif ($ageCondition === '>30') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(30))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');
                }
            } elseif ($request->input('cible') === 'sexe-cible'){
                $sexe = $request->input('sexe');
                if ($sexe === 'M') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('gender', 'male')
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');

                } elseif ($sexe === 'F') {
                    $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('gender', 'female')
                        ->where('ca.status', 'accept')
                        ->select('odcusers.email');
                }
            } elseif($request->input('cible') === 'personnalise'){
                $personnalise = $request-> input('person');
                $personnalise = explode(',', $personnalise);
                $personnalise = array_map('trim', $personnalise);
                $mailUsersQuery = $personnalise;
            }
        } else {
            if ($request->input('cible') === 'tout-le-monde'){
                $mailUsersQuery = Odcuser::query();

            } elseif ($request->input('cible') === 'activité'){
                $act = $request->input('per-activity');
                $mailUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.title', $act)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.email');
    
            } elseif ($request->input('cible') === 'age-cible'){
                $ageCondition = $request->input('age');
                if ($ageCondition === '>18') {
                    $mailUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(18));
                } elseif ($ageCondition === '<18') {
                    $mailUsersQuery->where('birth_date', '>', Carbon::now()->subYears(18));
                } elseif ($ageCondition === '>25') {
                    $mailUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(25));
                } elseif ($ageCondition === '>30') {
                    $mailUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(30));
                }

            } elseif ($request->input('cible') === 'sexe-cible'){
                $sexe = $request->input('sexe');
                if ($sexe === 'M') {
                    $mailUsersQuery->where('gender', 'male');

                } elseif ($sexe === 'F') {
                    $mailUsersQuery->where('gender', 'female');
                }
            } 
        }

        $failedEmails = [];
        $successEmails = [];

        if ($request->input('cible') === 'personnalise') {
            if (count($mailUsersQuery) !== 0) {
                $mailUsersQuery = collect($mailUsersQuery);
                $mailUsersQuery->chunk(100);
                foreach ($mailUsersQuery as $mailUser) {
                    try {
                        if (filter_var($mailUser, FILTER_VALIDATE_EMAIL)) {
                            Mail::to($mailUser)->send(new SendingMail($subject, $message));    // sending mail
                            $successEmails[] = $mailUser;
                        } else {
                            $failedEmails[] = $mailUser;
                        }                
                    } catch (\Exception $e) {
                        $failedEmails[] = $mailUser;
                    }
                }

                $modelId = ModelMail::select("id")->where('message', $model)->get();
                $mailId = $modelId->first()->id;
                $personNumber = count($successEmails);
                $failedNumber = count($failedEmails);
    
                // $validatedData = $request->validate([
                //     'message' => 'required|string',
                //     'person_number' => 'required|integer',
                //     'user_id' => 'required|exists:users,id',
                //     'activite_id' => 'required|exists:activites,id',
                //     'model_mail_id' => 'required|exists:model_mails,id',
                //     'sms_model_id' => 'required|exists:sms_models,id',
                // ]);
    
                if ($activiteId){
                    Notification::create([
                        'message' => $message,
                        'type' => 'Mail',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                        'activite_id' => $activiteId,
                        'model_mail_id' => $mailId,
                    ]);
                } else {
                    Notification::create([
                        'message' => $message,
                        'type' => 'Mail',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $notifId = Notification::max('id');

                if ($failedEmails){
                    foreach ($failedEmails as $faid) {
                        MailFailed::create([
                            'email' => $faid,
                            'notification_id' => $notifId
                        ]);
                    }    
                }
                
                if ($personNumber !== 0){
                    return back()->with("success", $personNumber ." mails send successfully and " . $failedNumber . " faileded");
                } else {
                    return back()->with("error", $personNumber ." mails send successfully and " . $failedNumber . " faileded");
                }
    
            } else {
                return back()->with("error", "Mail for this cible not found");            
            }
        } else {
            if ($mailUsersQuery->count() !== 0) {
                $mailUsersQuery->chunk(100, function ($mailUsers) use ($subject, $message) {
                    foreach ($mailUsers as $mailUser) {
                        try {
                            if (filter_var($mailUser->email, FILTER_VALIDATE_EMAIL)) {
                                Mail::to($mailUser->email)->send(new SendingMail($subject, $message));    // sending mail
                                $successEmails[] = $mailUser->email;
                            } else {
                                $failedEmails[] = $mailUser->email;
                            }                
                        } catch (\Exception $e) {
                            $failedEmails[] = $mailUser->email;
                        }
                    }
                });
    
                $modelId = ModelMail::select("id")->where('message', $model)->get();
                $mailId = $modelId->first()->id;
                $personNumber = count($successEmails);
                $failedNumber = count($failedEmails);
    
                // $validatedData = $request->validate([
                //     'message' => 'required|string',
                //     'person_number' => 'required|integer',
                //     'user_id' => 'required|exists:users,id',
                //     'activite_id' => 'required|exists:activites,id',
                //     'model_mail_id' => 'required|exists:model_mails,id',
                //     'sms_model_id' => 'required|exists:sms_models,id',
                // ]);
    
                if ($activiteId){
                    Notification::create([
                        'message' => $message,
                        'type' => 'Mail',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                        'activite_id' => $activiteId,
                        'model_mail_id' => $mailId,
                    ]);
                } else {
                    Notification::create([
                        'message' => $message,
                        'type' => 'Mail',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $notifId = Notification::max('id');

                if ($failedEmails){
                    foreach ($failedEmails as $faid) {
                        MailFailed::create([
                            'email' => $faid,
                            'notification_id' => $notifId
                        ]);
                    }    
                }
                    
                if ($personNumber !== 0){
                    return back()->with("success", $personNumber ." mails send successfully and " . $failedNumber . " faileded");
                } else {
                    return back()->with("error", $personNumber ." mails send successfully and " . $failedNumber . " faileded");
                }    

            } else {
                return back()->with("error", "Mail for this cible not found");            
            }
        }
    }

    public function autocomplete(Request $request)
    {
        $data = Activite::select("title")
                        ->where("title", "LIKE", "%{$request->input('query')}%")
                        ->limit(6)
                        ->get();

        return response()->json($data);
    }
}
