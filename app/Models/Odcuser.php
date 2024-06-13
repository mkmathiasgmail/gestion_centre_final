<?php

namespace App\Models;

use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function activite(): HasMany
    {
        return $this->hasMany(Activite::class);
    }

}
