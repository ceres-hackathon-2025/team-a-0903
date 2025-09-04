<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Species extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false; // created_at, updated_at を使わない設定

    /**
     * この動物種を取り扱う病院を取得
     */
    public function hospitals(): BelongsToMany
    {
        return $this->belongsToMany(Hospital::class, 'hospital_species');
    }
}
