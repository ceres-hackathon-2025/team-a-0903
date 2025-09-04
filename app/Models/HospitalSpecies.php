<?php

namespace App\Models;
use App\Enums\DayOfWeek; // 先ほど作成したEnumをインポート
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HospitalSpecies extends Model
{
    protected $fillable = ['hospital_id', 'species_id'];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

        /**
     * この病院が取り扱う動物種を取得 (ここから追記)
     */
    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Species::class, 'hospital_species');
    }
}
    