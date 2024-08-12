<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomboite',
        'employabilite_id',
    ];

    public function employabilite()
    {
        return $this->belongsTo(Employabilite::class);
    }
}