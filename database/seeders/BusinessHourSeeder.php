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
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 2,
            'hospital_id' =>1,
            'day_of_week' => 2,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 3,
            'hospital_id' =>1,
            'day_of_week' => 3,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 4,
            'hospital_id' =>1,
            'day_of_week' => 4,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 5,
            'hospital_id' =>1,
            'day_of_week' => 5,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 6,
            'hospital_id' =>1,
            'day_of_week' => 6,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 7,
            'hospital_id' =>1,
            'day_of_week' => 7,
            'start_time' => '09:30',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 8,
            'hospital_id' =>1,
            'day_of_week' => 1,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 9,
            'hospital_id' =>1,
            'day_of_week' => 2,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 10,
            'hospital_id' =>1,
            'day_of_week' => 3,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 11,
            'hospital_id' =>1,
            'day_of_week' => 4,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 12,
            'hospital_id' =>1,
            'day_of_week' => 5,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 13,
            'hospital_id' =>1,
            'day_of_week' => 6,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 14,
            'hospital_id' =>1,
            'day_of_week' => 7,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 15,
            'hospital_id' =>2,
            'day_of_week' => 2,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 16,
            'hospital_id' =>2,
            'day_of_week' => 3,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 17,
            'hospital_id' =>2,
            'day_of_week' => 4,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 18,
            'hospital_id' =>2,
            'day_of_week' => 5,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 19,
            'hospital_id' =>2,
            'day_of_week' => 6,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 20,
            'hospital_id' =>2,
            'day_of_week' => 7,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 21,
            'hospital_id' =>2,
            'day_of_week' => 2,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 22,
            'hospital_id' =>2,
            'day_of_week' => 3,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 23,
            'hospital_id' =>2,
            'day_of_week' => 4,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 24,
            'hospital_id' =>2,
            'day_of_week' => 5,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 25,
            'hospital_id' =>2,
            'day_of_week' => 6,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 26,
            'hospital_id' =>2,
            'day_of_week' => 7,
            'start_time' => '16:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 27,
            'hospital_id' =>2,
            'day_of_week' => 2,
            'start_time' => '20:00',
            'end_time' => '22:00',
        ]);
         BusinessHour::create([
            'id' => 28,
            'hospital_id' =>2,
            'day_of_week' => 3,
            'start_time' => '20:00',
            'end_time' => '22:00',
        ]);
         BusinessHour::create([
            'id' => 29,
            'hospital_id' =>2,
            'day_of_week' => 4,
            'start_time' => '20:00',
            'end_time' => '22:00',
        ]);
         BusinessHour::create([
            'id' => 30,
            'hospital_id' =>2,
            'day_of_week' => 5,
            'start_time' => '20:00',
            'end_time' => '22:00',
        ]);
         BusinessHour::create([
            'id' => 31,
            'hospital_id' =>3,
            'day_of_week' => 1,
            'start_time' => '10:00',
            'end_time' => '13:00',
        ]);
        BusinessHour::create([
            'id' => 32,
            'hospital_id' =>3,
            'day_of_week' => 2,
            'start_time' => '10:00',
            'end_time' => '13:00',
        ]);
        BusinessHour::create([
            'id' => 33,
            'hospital_id' =>3,
            'day_of_week' => 3,
            'start_time' => '10:00',
            'end_time' => '13:00',
        ]);
        BusinessHour::create([
            'id' => 34,
            'hospital_id' =>3,
            'day_of_week' => 5,
            'start_time' => '10:00',
            'end_time' => '13:00',
        ]);
        BusinessHour::create([
            'id' => 35,
            'hospital_id' =>3,
            'day_of_week' => 6,
            'start_time' => '10:00',
            'end_time' => '13:00',
        ]);
        BusinessHour::create([
            'id' => 36,
            'hospital_id' =>3,
            'day_of_week' => 1,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 37,
            'hospital_id' =>3,
            'day_of_week' => 2,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 38,
            'hospital_id' =>3,
            'day_of_week' => 3,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 39,
            'hospital_id' =>3,
            'day_of_week' => 5,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 40,
            'hospital_id' =>3,
            'day_of_week' => 6,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
        BusinessHour::create([
            'id' => 41,
            'hospital_id' =>4,
            'day_of_week' => 1,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
        BusinessHour::create([
            'id' => 42,
            'hospital_id' =>4,
            'day_of_week' => 2,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 43,
            'hospital_id' =>4,
            'day_of_week' => 3,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 44,
            'hospital_id' =>4,
            'day_of_week' => 4,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 45,
            'hospital_id' =>4,
            'day_of_week' => 5,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 46,
            'hospital_id' =>4,
            'day_of_week' => 6,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 47,
            'hospital_id' =>4,
            'day_of_week' => 7,
            'start_time' => '08:00',
            'end_time' => '18:00',
        ]);
         BusinessHour::create([
            'id' => 48,
            'hospital_id' =>5,
            'day_of_week' => 1,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 49,
            'hospital_id' =>5,
            'day_of_week' => 2,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 50,
            'hospital_id' =>5,
            'day_of_week' => 3,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 51,
            'hospital_id' =>5,
            'day_of_week' => 4,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 52,
            'hospital_id' =>5,
            'day_of_week' => 5,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 53,
            'hospital_id' =>5,
            'day_of_week' => 6,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 54,
            'hospital_id' =>5,
            'day_of_week' => 7,
            'start_time' => '09:00',
            'end_time' => '12:00',
        ]);
         BusinessHour::create([
            'id' => 55,
            'hospital_id' =>5,
            'day_of_week' => 1,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 56,
            'hospital_id' =>5,
            'day_of_week' => 2,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 57,
            'hospital_id' =>5,
            'day_of_week' => 3,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 58,
            'hospital_id' =>5,
            'day_of_week' => 4,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 59,
            'hospital_id' =>5,
            'day_of_week' => 5,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 60,
            'hospital_id' =>5,
            'day_of_week' => 6,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);
         BusinessHour::create([
            'id' => 61,
            'hospital_id' =>5,
            'day_of_week' => 7,
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);

    


    }   
}

