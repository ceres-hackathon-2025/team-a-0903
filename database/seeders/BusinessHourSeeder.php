<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessHour;

class BusinessHourSeeder extends Seeder
{
    public function run(): void
    {
        // 各病院の営業時間を定義
        $hours = [
            1 => [ // 病院1
                ['09:30', '12:00'],
                ['15:00', '19:00'],
            ],
            2 => [ // 病院2
                ['09:00', '12:00', [2,3,4,5,6,7]],
                ['16:00', '19:00', [2,3,4,5,6,7]],
                ['20:00', '22:00', [2,3,4,5,6,7]],
            ],
            3 => [ // 病院3
                ['10:00', '13:00', [1, 2, 3, 5, 6]],
                ['15:00', '19:00', [1, 2, 3, 5, 6]],
            ],
            4 => [ // 病院4
                ['08:00', '18:00'],
            ],
            5 => [ // 病院5
                ['09:00', '12:00'],
                ['15:00', '19:00'],
            ],

            #以下ダミー
            6 => [ // 病院6
                ['09:00', '12:00'],
                ['15:00', '16:00'],
            ],
            7 => [ // 病院7
                ['09:00', '12:00'],
                ['15:00', '24:00'],
            ],
            8 => [ // 病院8
                ['00:00', '12:00'],
                ['15:00', '23:00'],
            ],
            9 => [ // 病院9
                ['09:00', '12:00'],
                ['15:00', '17:00'],
            ],
            10 => [ // 病院10
                ['09:00', '12:00'],
                ['15:00', '18:00'],
            ],
        ];

        foreach ($hours as $hospitalId => $timeBlocks) {
            foreach ($timeBlocks as $block) {
                // 時間帯だけが定義されている場合 → 全曜日
                $start = $block[0];
                $end = $block[1];
                $days = $block[2] ?? range(1, 7); // 曜日指定がなければ1〜7

                foreach ($days as $day) {
                    BusinessHour::create([
                        'hospital_id' => $hospitalId,
                        'day_of_week' => $day,
                        'start_time' => $start,
                        'end_time' => $end,
                    ]);
                }
            }
        }
    }
}
