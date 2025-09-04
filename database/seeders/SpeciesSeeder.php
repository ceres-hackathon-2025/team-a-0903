<?php

namespace Database\Seeders;

use App\Models\Species; // Speciesモデルをインポート
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサードをインポート

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Species::create([
            'id' => 1, 
            'name' => '犬'
        ]);
        Species::create([
            'id' => 2, 
            'name' => '猫'
        ]);
        Species::create([
            'id' => 3, 
            'name' => 'うさぎ'
        ]);
        Species::create([
            'id' => 4, 
            'name' => 'ハムスター'
        ]);
        Species::create([
            'id' => 5, 
            'name' => 'フェレット'
        ]);
        Species::create([
            'id' => 6, 
            'name' => '鳥類'
        ]);
        Species::create([
            'id' => 7, 
            'name' => '両生類'
        ]);
        Species::create([
            'id' => 8, 
            'name' => '爬虫類'
        ]);
        Species::create([
            'id' => 9, 
            'name' => 'その他'
        ]);
    }
}
