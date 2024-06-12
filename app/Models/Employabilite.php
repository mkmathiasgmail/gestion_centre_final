<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employabilite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_contrat',
        'genre_contrat',
        'nomboite',
        'periode',

    ];

}
