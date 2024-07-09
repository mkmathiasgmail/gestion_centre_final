<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TypeEvent extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'typeEvent'];

    public function activite(): BelongsToMany
    {
        return $this->belongsToMany(Activite::class);
    }
}
