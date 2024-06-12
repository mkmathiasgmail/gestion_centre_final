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
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'birthdate',
        'phone',
        'linkedin',
        'profession',
        'company',
        'university',
        'speciality',
        'country',
        'cv',
        'photo'
    ] ;
    protected $primaryKey = 'id' ;

    public function activite(): HasMany
    {
        return $this->hasMany(Activite::class);
    }

}
