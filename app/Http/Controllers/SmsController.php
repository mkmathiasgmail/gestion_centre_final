<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\SmsModel;
use App\Models\SmsFailed;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\CandidatAttribute;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        Carbon::setLocale('fr');

        $message = $request->input('message');
        $activiteId = $request->input('activity');
        $model = $request->input('model-sms');

        $activite = Activite::where("id", $activiteId)->first();
        if (!$activite) {
            return back()->with("error", "Activité non trouvée");
        }

        $startDate = Carbon::parse($activite->start_date)->translatedFormat('l d F');
        $endDate = Carbon::parse($activite->end_date)->translatedFormat('l d F Y');

        $message = str_replace(['::activite', '::start_date', '::end_date'], [$activite->title, $startDate, $endDate], $message);

        $smsUsersQuery = CandidatAttribute::query();

        if ($request->input('activity') !== '') {
            if ($request->input('cible') === 'tout-le-monde'){
                $smsUsersQuery = CandidatAttribute::query()->leftJoin('candidats as ca', 'ca.id', '=', 'candidat_attributes.candidat_id')
                    ->where("ca.activite_id", $activiteId)
                    ->whereRaw('LENGTH(CAST(RIGHT(value, 9) AS SIGNED)) = 9')
                    ->select(DB::raw('CAST(RIGHT(value, 9) AS SIGNED) AS phone_number'));

            } elseif ($request->input('cible') === 'accepté'){
                $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.id', $activiteId)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.phone');
    
            } elseif ($request->input('cible') === 'decline'){
                $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.id', $activiteId)
                    ->where('ca.status', 'decline')
                    ->select('odcusers.phone');
    
            } elseif ($request->input('cible') === 'activité'){
                $act = $request->input('per-activity');
                $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.title', $act)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.phone');
    
            } elseif ($request->input('cible') === 'age-cible'){
                $ageCondition = $request->input('age');
                if ($ageCondition === '>18') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(18))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');

                } elseif ($ageCondition === '<18') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '>', Carbon::now()->subYears(18))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');

                } elseif ($ageCondition === '>25') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(25))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');

                } elseif ($ageCondition === '>30') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('birth_date', '<=', Carbon::now()->subYears(30))
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');
                }
            } elseif ($request->input('cible') === 'sexe-cible'){
                $sexe = $request->input('sexe');
                if ($sexe === 'M') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('gender', 'male')
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');

                } elseif ($sexe === 'F') {
                    $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                        ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                        ->where('ac.id', $activiteId)
                        ->where('gender', 'female')
                        ->where('ca.status', 'accept')
                        ->select('odcusers.phone');
                }
            } elseif($request->input('cible') === 'personnalise'){
                $personnalise = $request-> input('person');
                $personnalise = explode(',', $personnalise);
                $personnalise = array_map('trim', $personnalise);
                $smsUsersQuery = $personnalise;
            }
        } else {
            if ($request->input('cible') === 'tout-le-monde'){
                $smsUsersQuery = Odcuser::query();

            } elseif ($request->input('cible') === 'activité'){
                $act = $request->input('per-activity');
                $smsUsersQuery->leftJoin('candidats as ca', 'ca.odcuser_id', '=', 'odcusers.id')
                    ->leftJoin('activites as ac', 'ac.id', '=', 'ca.activite_id')
                    ->where('ac.title', $act)
                    ->where('ca.status', 'accept')
                    ->select('odcusers.phone');
    
            } elseif ($request->input('cible') === 'age-cible'){
                $ageCondition = $request->input('age');
                if ($ageCondition === '>18') {
                    $smsUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(18));
                } elseif ($ageCondition === '<18') {
                    $smsUsersQuery->where('birth_date', '>', Carbon::now()->subYears(18));
                } elseif ($ageCondition === '>25') {
                    $smsUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(25));
                } elseif ($ageCondition === '>30') {
                    $smsUsersQuery->where('birth_date', '<=', Carbon::now()->subYears(30));
                }

            } elseif ($request->input('cible') === 'sexe-cible'){
                $sexe = $request->input('sexe');
                if ($sexe === 'M') {
                    $smsUsersQuery->where('gender', 'male');

                } elseif ($sexe === 'F') {
                    $smsUsersQuery->where('gender', 'female');
                }
            } 
        }

        $failedNumbers = [];
        $successNumbers = [];

        if ($request->input('cible') === 'personnalise') {
            if (count($smsUsersQuery) !== 0) {
                $smsUsersQuery = collect($smsUsersQuery);
                $smsUsersQuery->chunk(100);
                foreach ($smsUsersQuery as $smsUser) {
                    try {
                        if ($this->isPhoneNumberValid($smsUser)) {
                            // Simuler l'envoi de SMS
                            $successNumbers[] = $smsUser;
                        } else {
                            $failedNumbers[] = $smsUser;
                        }
                    } catch (\Exception $e) {
                        $failedNumbers[] = $smsUser;
                    }
                }

                $modelId = SmsModel::select("id")->where('message', $model)->get();
                $smsId = $modelId->first()->id;
                $personNumber = count($successNumbers);
                $failedNumber = count($failedNumbers);

                if ($activiteId){
                    Notification::create([
                        'message' => $message,
                        'type' => 'SMS',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                        'activite_id' => $activiteId,
                        'sms_model_id' => $smsId,
                    ]);
                } else {
                    Notification::create([
                        'message' => $message,
                        'type' => 'SMS',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $notifId = Notification::max('id');

                if ($failedNumbers) {
                    foreach ($failedNumbers as $failed) {
                        SmsFailed::create([
                            'phone_number' => $failed,
                            'notification_id' => $notifId
                        ]);
                    }
                }

                if ($personNumber !== 0){
                    return back()->with("success", $personNumber ." sms envoyé avec succès et " . $failedNumber . " ont échoués");
                } else {
                    return back()->with("error", $personNumber ." sms envoyé avec succès et " . $failedNumber . " ont échoués, veillez verifier ces sms");
                }
    
            } else {
                return back()->with("error", "Aucun numéro téléphone trouvé pour cette cible");            
            }
        } else {
            if ($smsUsersQuery->count() !== 0) {
                $smsUsersQuery->chunk(100, function ($smsUsers) use ($message, &$successNumbers, &$failedNumbers) {
                    foreach ($smsUsers as $smsUser) {
                        try {
                            if ($this->isPhoneNumberValid($smsUser->phone)) {
                                // Simuler l'envoi de SMS
                                $successNumbers[] = $smsUser->phone;
                            } else {
                                $failedNumbers[] = $smsUser->phone;
                            }
                        } catch (\Exception $e) {
                            $failedNumbers[] = $smsUser->phone;
                        }
                    }    
                });

                $modelId = SmsModel::select("id")->where('message', $model)->get();
                $smsId = $modelId->first()->id;
                $personNumber = count($successNumbers);
                $failedNumber = count($failedNumbers);

                if ($activiteId){
                    Notification::create([
                        'message' => $message,
                        'type' => 'SMS',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                        'activite_id' => $activiteId,
                        'sms_model_id' => $smsId,
                    ]);
                } else {
                    Notification::create([
                        'message' => $message,
                        'type' => 'SMS',
                        'person_number' => $personNumber,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                $notifId = Notification::max('id');

                if ($failedNumbers) {
                    foreach ($failedNumbers as $failed) {
                        SmsFailed::create([
                            'phone_number' => $failed,
                            'notification_id' => $notifId
                        ]);
                    }
                }

                if ($personNumber !== 0){
                    return back()->with("success", $personNumber ." sms envoyé avec succès et " . $failedNumber . " ont échoués");
                } else {
                    return back()->with("error", $personNumber ." sms envoyé avec succès et " . $failedNumber . " ont échoués, veillez verifier ces sms");
                }

            } else {
                return back()->with("error", "Aucun numéro téléphone trouvé pour cette cible");            
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
    
    private function isPhoneNumberValid($phoneNumber)
    {
        // Example regex for validating phone numbers
        // Matches +243824965775 or 824965775 (DRC phone number format)
        return preg_match('/^(?:\+243|0)?[0-9]{9}$/', $phoneNumber);
    }
}
