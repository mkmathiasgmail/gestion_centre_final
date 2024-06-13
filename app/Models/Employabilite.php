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
        'nomboite',
        'periode',
        'odcuser_id'

    ];

    public function odcuser()
    {
        return $this->belongsTo(Odcuser::class);
    }

}
