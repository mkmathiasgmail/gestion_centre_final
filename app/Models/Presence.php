<?php

namespace App\Models;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable=['date','candidat_id'];
=======
    protected $fillable=['date', 'candidat_id'];
>>>>>>> 03360cbbd4006de2704fd44990b6cfcd5217be27
   
    public function candidat():BelongsTo
    {
        return $this->belongsTo(Candidat::class);
    }

 
}
