<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;
use App\Models\Odcuser;
use App\Models\Activite;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'odcuser_id',
        'activite_id',
        'status',
        'createdAt',
        'uuid'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
    protected $table = "candidats";

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

    public function candidat_attribute(): HasMany
    {
        return $this->hasMany(CandidatAttribute::class);
    }
}
