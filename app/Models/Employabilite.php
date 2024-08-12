<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employabilite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_contrat_id',
        'periode',
        'odcuser_id',
        'derniere_activite',
        'derniere_service',
        'date_participation',
    ];

    public function odcuser()
    {
        return $this->belongsTo(Odcuser::class);
    }
    public function type_contrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }

    public function entreprise()
    {
        return $this->hasMany(Entreprise::class);
    }

    public function poste()
    {
        return $this->hasMany(Poste::class);
    }
}