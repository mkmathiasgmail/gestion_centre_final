<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activite extends Model
{
    use HasFactory;

    protected $fillable= ['title','description','lieu','image','status','date_debut','date_fin'];


    // public function etiquette()
    // {
    //     return $this->belongsToMany(Etiquette::class);
    // }

    // public function categorie()
    // {
    //     return $this->belongsTo(Categorie::class);
    // }
}
