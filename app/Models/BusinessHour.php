<?php

namespace App\Models;

use App\Enums\DayOfWeek; // 先ほど作成したEnumをインポート
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessHour extends Model
{
    use HasFactory;

    /**
     * 一括代入を許可する属性
     *
     * @var array
     */
    protected $fillable = [
        'hospital_id',
        'day_of_week',
        'start_time',
        'end_time',
        'note',
    ];

    /**
     * 属性キャスト
     *
     * @var array
     */
    protected $casts = [
        'day_of_week' => DayOfWeek::class, // day_of_weekカラムをEnumにキャスト
        'start_time' => 'datetime:H:i', // 時刻のフォーマットを指定
        'end_time' => 'datetime:H:i',   // 時刻のフォーマットを指定
    ];

    /**
     * この営業時間が属する病院を取得 (リレーションシップ)
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }
}