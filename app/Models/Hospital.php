<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hospital extends Model
{
    use HasFactory;

    /**
     * 一括代入を許可する属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'post_code',
        'address',
        'tel',
        'homepage_url',
        'googleMap_url',
        'images',
        'note',
    ];

    /**
     * 属性キャスト
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array', // 'images'属性を自動で配列に変換
    ];

    // BusinessHourとのリレーション (既存)
    public function businessHours(): HasMany
    {
        return $this->hasMany(BusinessHour::class);
    }

    public function hospitalImages(): HasMany
    {
        return $this->hasMany(HospitalImages::class);
    }
    
    /**
     * この病院が取り扱う動物種を取得 (ここから追記)
     */
    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Species::class, 'hospital_species');
    }
    
    // App\Models\Hospital.php

public function hospitalImages()
{
    return $this->hasMany(HospitalImages::class);
}

}
