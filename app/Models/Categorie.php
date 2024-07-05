<?php

namespace App\Models;

use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable= ['name'];

    public function articles()
    {
        return $this->hasMany(Activite::class);
    }
}
