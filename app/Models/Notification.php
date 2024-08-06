<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'type',
        'person_number',
        'user_id',
        'activite_id',
        'model_mail_id',
        'sms_model_id'
    ];
}
