<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activite;
use App\Models\Notification;
use Illuminate\Http\Client\Request;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\ModelMail;
use App\Models\SmsModel;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites = Activite::where('start_date', '>', Carbon::now())->get();
        $modelMail = ModelMail::all();
        $modelSms = SmsModel::all();
        $notifications = Notification::query()->leftJoin('users as us', 'us.id', '=', 'notifications.user_id')
            ->leftJoin('activites as ac', 'ac.id', '=', 'notifications.activite_id')
            ->leftJoin('model_mails as mm', 'mm.id', '=', 'notifications.model_mail_id')
            ->leftJoin('sms_models as sm', 'sm.id', '=', 'notifications.sms_model_id')
            ->select(
                'us.name',
                'ac.title',
                'notifications.message', 
                'notifications.type', 
                'notifications.send_date', 
                'notifications.person_number', 
                'notifications.model_mail_id', 
                'notifications.sms_model_id'
                )
            ->orderBy('notifications.id', 'asc')
            ->get();

        return view("notifications.index", compact('activites', 'modelMail', 'modelSms', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }

}
