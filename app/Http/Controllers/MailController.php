<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Candidat;
use App\Mail\SendingMail;
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

        if ($request->input('cible') === 'personnalise') {
            if (count($mailUsersQuery) !== 0) {
                $mailUsersQuery = collect($mailUsersQuery);
                $mailUsersQuery->chunk(100);

                foreach ($mailUsersQuery as $mailUser) {
                    try {
                        Mail::to($mailUser)->send(new SendingMail($subject, $message));
                
                        // Vérifier si des échecs sont survenus
                        $currentFailures = Mail::failures();
                        if (!empty($currentFailures)) {
                            // Ajouter les échecs actuels au tableau des emails échoués
                            $failedEmails = array_merge($failedEmails, $currentFailures);
                        }
                    } catch (\Exception $e) {
                        // En cas d'erreur d'envoi, ajouter l'e-mail au tableau des échecs
                        $failedEmails[] = $mailUser;
                        Log::error('Erreur lors de l\'envoi de l\'email à ' . $mailUser . ': ' . $e->getMessage());
                    }
                }

                echo print_r($failedEmails);


                if (!empty($failedEmails)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Certains e-mails n\'ont pas pu être envoyés',
                        'failedEmails' => $failedEmails  // Retourner la liste des e-mails échoués
                    ]);
                } else {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Tous les e-mails ont été envoyés avec succès'
                    ]);
                }
;;    
                // $modelId = ModelMail::select("id")->where('message', $model)->get();
    
                // $mailId = $modelId->first()->id;
    
                // $validatedData = $request->validate([
                //     'message' => 'required|string',
                //     'person_number' => 'required|integer',
                //     'user_id' => 'required|exists:users,id',
                //     'activite_id' => 'required|exists:activites,id',
                //     'model_mail_id' => 'required|exists:model_mails,id',
                //     'sms_model_id' => 'required|exists:sms_models,id',
                // ]);
    
                // if ($activiteId){
                //     Notification::create([
                //         'message' => $message,
                //         'type' => 'Mail',
                //         'person_number' => $mailUsersQuery->count(),
                //         'user_id' => auth()->user()->id,
                //         'activite_id' => $activiteId,
                //         'model_mail_id' => $mailId,
                //     ]);
                // } else {
                //     Notification::create([
                //         'message' => $message,
                //         'type' => 'Mail',
                //         'person_number' => $mailUsersQuery->count(),
                //         'user_id' => auth()->user()->id,
                //     ]);
                // }
    
                // return back()->wit("success", "Mail send successfully");
    
            } else {
                return back()->with("error", "Mail for this cible not found");            
            }
        }

        if ($milUsersQuery->count() !== 0) {
            $mailUsersQuery->chunk(100, function ($mailUsers) use ($subject, $message) {
                foreach ($mailUsers as $mailUser) {
                    try {
                        Mail::to($mailUser->email)->send(new SendingMail($subject, $message));
                        // return response()->json([
                        //     'status' => 'success', 
                        //     'message' => 'Email envoyé avec succès', 
                        //     'email' => $mailUser->email  // Retourner l'e-mail
                        // ]);
                    } catch (\Exception $e) {
                        // return response()->json([
                        //     'status' => 'error', 
                        //     'message' => 'Erreur lors de l\'envoi de l\'email : ' . $e->getMessage(),
                        //     'email' => $mailUser->email  // Retourner l'e-mail même en cas d'erreur
                        // ]);
                    }
                }
            });

            $modelId = ModelMail::select("id")->where('message', $model)->get();

            $mailId = $modelId->first()->id;

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
                    'person_number' => $mailUsersQuery->count(),
                    'user_id' => auth()->user()->id,
                    'activite_id' => $activiteId,
                    'model_mail_id' => $mailId,
                ]);
            } else {
                Notification::create([
                    'message' => $message,
                    'type' => 'Mail',
                    'person_number' => $mailUsersQuery->count(),
                    'user_id' => auth()->user()->id,
                ]);
            }

            return back()->with("success", "Mail send successfully");

        } else {
            return back()->with("error", "Mail for this cible not found");            
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

    public function getNotif(Request $request)
    {
        try {
            $query = Notification::query()->leftJoin('users as us', 'us.id', '=', 'notifications.user_id')
            ->leftJoin('activites as ac', 'ac.id', '=', 'notifications.activite_id')
            ->select(
                'us.name',
                'ac.title',
                'notifications.message', 
                'notifications.type', 
                'notifications.send_date', 
                'notifications.person_number', 
                )
            ->get();

            return DataTables::eloquent($query)
                ->make(true);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue : ' . $e->getMessage()], 500);
        }
    }
}
