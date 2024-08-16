<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseraMember extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'email',
        'external_id',
        'enrolled_courses',
        'completed_courses',
        'member_state',
        'join_date',
        'invitation_date',
        'latest_program_activity_date'
    ];
}
