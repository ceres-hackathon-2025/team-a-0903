<?php

namespace Database\Seeders;

use App\Models\BusinessHour;  // モデルをインポート
use Illuminate\Database\Seeder;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         BusinessHour::create([
            'id' => 1,
            'hospital_id' =>1,
            'day_of_week' => 1,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 2,
            'hospital_id' =>1,
            'day_of_week' => 2,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 3,
            'hospital_id' =>1,
            'day_of_week' => 3,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 4,
            'hospital_id' =>1,
            'day_of_week' => 4,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 5,
            'hospital_id' =>1,
            'day_of_week' => 5,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 6,
            'hospital_id' =>1,
            'day_of_week' => 6,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 7,
            'hospital_id' =>1,
            'day_of_week' => 7,
            'start_time' => '9:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 8,
            'hospital_id' =>1,
            'day_of_week' => 2,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 9,
            'hospital_id' =>1,
            'day_of_week' => 3,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
BusinessHour::create([
            'id' => 10,
            'hospital_id' =>1,
            'day_of_week' => 4,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
    }   
}
