<?php

namespace App\Http\Controllers;

use App\Mail\SendingMail;
use App\Models\ModelMail;
use App\Models\Notification;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("notifications.index");
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

    public function sendMail()
    {

        $title = 'Ecole de code';
        // $title = $request->input('title');
        $subject = 'Invitations a ODC Academy';
        // $subject = $request->input('subject');

        $message = ModelMail::select('message')->where('title', $title);

        $message = $message->first()->message;

        Mail::to('junwalker001@gmail.com')->send(new SendingMail($subject, $message));

        dd('Mail sent successfully.');
    }
}
