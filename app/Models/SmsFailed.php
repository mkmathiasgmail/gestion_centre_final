<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsFailed extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'notification_id'];
}
