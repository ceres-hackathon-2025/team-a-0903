<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalImagesSeeder extends Seeder
{
    public function run(): void
    {
        $hospitalImages = [

            1 => ['friends_1.png', 'friends_2.png'],
            2 => ['動物医療センター_1.png', '動物医療センター_2.png'],
            3 => ['lulu_1.png', 'lulu_2.png'],
            4 => ['doggy_1.png', 'doggy_2.png'],
            5 => ['halu_1.png', 'halu_2.png'],
              
            //以下ダミー
            6 => ['friends_1.png', 'friends_2.png'],
            7 => ['動物医療センター_1.png', '動物医療センター_2.png'],
            8 => ['lulu_1.png', 'lulu_2.png'],
            9 => ['doggy_1.png', 'doggy_2.png'],
            10 => ['halu_1.png', 'halu_2.png'],
        ];

        foreach ($hospitalImages as $hospitalId => $images) {
            foreach ($images as $image) {
                DB::table('hospital_images')->insert([
                    'hospital_id' => $hospitalId,
                    'image_path' => "/images/hospital_images/{$image}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
