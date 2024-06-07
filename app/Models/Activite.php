<?php

namespace App\Models;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'lieu', 'image', 'status', 'date_debut', 'date_fin','categorie_id'];


    // public function etiquette()
    // {
    //     return $this->belongsToMany(Etiquette::class);
    // }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function candidat(): HasMany
    {
        return $this->hasMany(Candidat::class);
    }
}
