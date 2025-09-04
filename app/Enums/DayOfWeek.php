<?php

namespace App\Enums;

enum DayOfWeek: int
{
    case MONDAY = 1;
    case TUESDAY = 2;
    case WEDNESDAY = 3;
    case THURSDAY = 4;
    case FRIDAY = 5;
    case SATURDAY = 6;
    case SUNDAY = 7;

    /**
     * 曜日を日本語名で取得します。
     *
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::MONDAY => '月曜日',
            self::TUESDAY => '火曜日',
            self::WEDNESDAY => '水曜日',
            self::THURSDAY => '木曜日',
            self::FRIDAY => '金曜日',
            self::SATURDAY => '土曜日',
            self::SUNDAY => '日曜日',
        };
    }
}