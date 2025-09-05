<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class HospitalImages extends Model
{

    //
    
    public function hospitals(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }
}
