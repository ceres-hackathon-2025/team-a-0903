<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalImagesSeeder extends Seeder
{
    public function run(): void
    {
        $hospitalImages = [
            1 => ['friends_1.jpg', 'friends_2.jpg'],
            2 => ['動物医療センター_1.jpg', '動物医療センター_2.jpg'],
            3 => ['lulu_1.jpg', 'lulu_2.jpg'],
            4 => ['doggy_1.jpg', 'doggy_2.jpg'],
            5 => ['halu_1.jpg', 'halu_2.jpg'],
        ];

        foreach ($hospitalImages as $hospitalId => $images) {
            foreach ($images as $image) {
                DB::table('hospital_images')->insert([
                    'hospital_id' => $hospitalId,
                    'image_path' => "images/hospitals/{$image}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
