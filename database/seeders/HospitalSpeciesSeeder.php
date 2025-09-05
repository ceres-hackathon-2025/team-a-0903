<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Hospital;
use App\Models\Species;

class HospitalSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 病院と動物をそれぞれ取得
        $hospitals = Hospital::all();
        $animals = Species::all();

        // データの関連付け（例として、特定の組み合わせで関連付け）
        $hospitals->find(1)->species()->attach($animals->find(1));
        $hospitals->find(1)->species()->attach($animals->find(2));

        $hospitals->find(2)->species()->attach([1, 2, 3, 4, 6]);
        $hospitals->find(3)->species()->attach([1, 2]);
        $hospitals->find(4)->species()->attach([1, 2]);

        // 複数の動物をまとめて関連付けることも可能
        $hospitals->find(5)->species()->attach([1, 2, 3, 4, 7, 8]);

        //以下ダミー
        $hospitals->find(6)->species()->attach([5]);
        $hospitals->find(7)->species()->attach([6]);
        $hospitals->find(8)->species()->attach([5,6]);
        $hospitals->find(9)->species()->attach([1]);
        $hospitals->find(10)->species()->attach([3,4,5]);
    }
}

