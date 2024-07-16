<?php

namespace App\Http\Controllers;

use App\Models\Odcuser;
use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function showForm()
    {
        return view('emails.email_form');
    }

    public function sendEmail(Request $request)
    {
        set_time_limit(40000);
        $messageContent = $request->input('message');
        $categories = $request->input('categories', []);

        $emails = [];

        if (in_array('all', $categories)) {
            $emails = array_merge(
                Odcuser::pluck('email')->toArray(),
               // Candidat::pluck('email')->toArray()
            );
        } else {
            if (in_array('women', $categories)) {
                $emails = array_merge(
                    Odcuser::where('gender', 'female')->pluck('email')->toArray(),
                   // Candidat::where('gender', 'female')->pluck('email')->toArray()
                );
            }
            if (in_array('men', $categories)) {
                $emails = array_merge(
                    Odcuser::where('gender', 'male')->pluck('email')->toArray(),
                    //Candidat::where('gender', 'male')->pluck('email')->toArray()
                );
            }
            if (in_array('students', $categories)) {
                $emails = array_merge(
                    Odcuser::where('is_student', true)->pluck('email')->toArray(),//a retirer du code 
                    //Candidat::where('is_student', true)->pluck('email')->toArray()
                );
            }
}
    
$emails = array_unique($emails);

foreach ($emails as $email) {
    Mail::to($email)->bcc("gabrieltwite200@gmail.com")
                    ->queue(new Notification($messageContent));
}

return redirect()->back()->with('success', 'Emails envoyés avec succès !');
}}