<?php

namespace App\Models;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'location',  'status', 'typeEvent', 'startDate', 'endDate', 'categorie_id'];
    protected $casts = [
        'categories' => 'array'
    ];

    public function hashtag(): BelongsToMany
    {
        return $this->belongsToMany(Hashtag::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function candidat(): HasMany
    {
        return $this->hasMany(Candidat::class);
    }
}
