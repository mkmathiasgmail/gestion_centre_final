<?php

namespace App\Models;

use App\Models\Odcuser;
use App\Models\Activite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'odcuser_id',
        'activite_id',
        'status'
    ] ;
    protected $table = "candidats" ;

    public function odcuser(): BelongsTo
    {
        return $this->belongsTo(Odcuser::class);
    }

    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }

}
