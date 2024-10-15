<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouseraProvince extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nom',
        'prenom',
        'postnom',
        'genre',
        'numero',
        'universite',
    ];
}
