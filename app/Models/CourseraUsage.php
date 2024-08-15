<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseraUsage extends Model
{
    use HasFactory;

    protected $fillable = [     

        'email',
        'course_name',
        'course_id',
        'course_slug',
        'university',
        'enrollement_time',
        'class_start_time',
        'class_end_time',
        'last_course_activity',
        'overall_progress',
        'estimated_learning_hours',
        'completed',
        'removed_from_program',
        'enrollement_source',
        'completion_time',
        'course_grade',
        'course_certificate_url',
        'course_type',
        
    ];
}
