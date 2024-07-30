<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'libelle',
    ];
    public function employabilite()
    {
        return $this->belongsTo(Employabilite::class);
    }
}

