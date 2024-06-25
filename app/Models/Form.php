<?php

namespace App\Models;

use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'inputs', 'type', '_id', 'deleted','status', 'odcCountry', 'createdAt', 'updatedAt'  ];


    public function activite()
    {
        return $this->hasMany(Activite::class);
    }
}
