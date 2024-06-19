<?php

namespace App\Models;

use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Odcuser extends Model
{
    use HasFactory;

    protected $table = "odcusers" ;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'gender',
        'birthDay',
        'linkedIn',
        'profession',
        'odcCountry',
        'role',
        'isActive',
        'hashtags',
        'codingSchool',
        'fabLabSolidaire',
        'training',
        'internship',
        'event',
        'subscribe',
        'newsletters',
        'topics',
        'last_connection',
        '_id',
        'detailProfession',
        'createdAt',
        'updatedAt',
        '__v',
        'picture',
        'userCV'
    ] ;

    protected $casts = [
        'profession' => 'array',
        'detailProfession' => 'array'
    ];

    public function activite(): BelongsToMany
    {
        return $this->belongsToMany(Activite::class);
    }

}
