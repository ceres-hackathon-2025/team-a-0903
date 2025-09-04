<?php

namespace Database\Seeders;

use App\Models\Hospital; // Hospitalモデルをインポート
use App\Models\Species;  // Speciesモデルをインポート
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hospital::create([
            'id' => 1,
            'name' => 'SHIBUYA・フレンズ動物病院',
            'post_code' => '150-0002',
            'address' => '東京都渋谷区渋谷3-10-15 川名ビル１F',
            'tel' => '03-3499-7117',
            'homepage_url' => 'https://www.sjd.co.jp/hospital/',
            'images' => null, // 画像データがないためnull
            'googleMap_url' => 'https://maps.app.goo.gl/qZmKBhUHrub9DY3C7',
        ]);
        Hospital::create([
            'id' => 2,
            'name' => '渋谷動物医療センター',
            'post_code' => '150-0002',
            'address' => '東京都渋谷区渋谷1丁目15-20',
            'tel' => '03-6421-0960',
            'homepage_url' => 'https://samc.co.jp/',
            'images' => null,
            'googleMap_url' => 'https://maps.app.goo.gl/ov2TfHnHDR53vyhu5',
        ]);
        Hospital::create([
            'id' => 3,
            'name' => '渋谷道玄坂ルルペットクリニック',
            'post_code' => '150-0043',
            'address' => '東京都渋谷区道玄坂2-16-3 高葉屋ビル２F',
            'tel' => '03-6416-1872',
            'homepage_url' => 'https://lulu-shibuya.com/',
            'images' => null,
            'googleMap_url' => 'https://maps.app.goo.gl/VKsqsmbqs1SwQo4T',
        ]);
        Hospital::create([
            'id' => 4,
            'name' => 'ドギーズアイランド渋谷松濤',
            'post_code' => '150-0046',
            'address' => '東京都渋谷区松濤1丁目28-5',
            'tel' => '03-6555-1600',
            'homepage_url' => 'https://doggys-petcare.jp/',
            'images' => null,
            'googleMap_url' => 'https://maps.app.goo.gl/VfWREeBqeVKGKVYA',
        ]);
        Hospital::create([
            'id' => 5,
            'name' => 'HALU動物病院',
            'post_code' => '150-0033',
            'address' => '東京都渋谷区猿楽町3番9号',
            'tel' => '03-6712-7299',
            'homepage_url' => 'https://www.halu.vet/',
            'images' => null,
            'googleMap_url' => 'https://maps.app.goo.gl/ue26aGunztJKKL657',
        ]);



    }
}
