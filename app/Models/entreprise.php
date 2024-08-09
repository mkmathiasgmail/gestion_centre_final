<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [

        'nomboite',
        



    ];

    public function employabilte()
    {
        return $this->belongsToMany(Employabilite::class);
    }
}