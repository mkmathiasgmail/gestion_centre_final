<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function  usage(): BelongsTo
    {
        return $this->belongsTo(CourseraUsage::class);
    }
    public function  specialisation(): BelongsTo
    {
        return $this->belongsTo(CourseraSpecialisation::class);
    }
}
