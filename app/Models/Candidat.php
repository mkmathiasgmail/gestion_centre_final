<?php

namespace App\Models;

use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(Odcuser::class, 'odcuser_id');
    }

    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }
    
    public function presence(): HasMany
    {
        return $this->hasMany(Presence::class);
    }

}
