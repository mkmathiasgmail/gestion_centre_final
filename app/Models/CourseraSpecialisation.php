<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseraSpecialisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'specialisaton_name',
        'specialisaton_slug',
        'university',
        'enrollement_time',
        'last_specialisation_activity',
        'completed_courses',
        'courses_in_specialisation',
        'completed',
        'removed_from_program',
        'enrollment_source',
        'specialization_completion_time',
        'specialization_certificate_url'
    ];
}
