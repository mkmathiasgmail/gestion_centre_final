<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailFailed extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'notification_id'];
}
