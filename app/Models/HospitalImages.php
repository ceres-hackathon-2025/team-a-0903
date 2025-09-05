<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalImages extends Model
{
    protected $fillable = ['hospital_id', 'image_path'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
