<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class HospitalController extends Controller
{
    /**
     * 動物病院一覧を表示します。
     */
    public function index(): View
    {
        $selectedAnimals = [];
        //$hospitals = Hospital::all();
        $animals = Species::all();
        $hospitals = Hospital::with('species', 'businessHours')->get();

        /*
        foreach($all as $value) {
            var_dump($value->name);
            foreach($value->species as $a) {
                var_dump($a->name);
            }
        }
        die();
        */
        //dd($hospitals->find(1)->species()->get());
        //dd($animals_data);
        //dd($hospitals, $animals_hospital);

        return view('index', compact('hospitals', 'animals', 'selectedAnimals'));
    }

    public function search(Request $request): View
    {
        //dd($request);
        $keyword = $request->query('keyword', '');
        $selectedAnimals = $request->query('animal', []);

        $hospitals = $this->getHospitals();
        $animals = $this->getAnimals();

        if ($keyword) {
            $hospitals = $hospitals->filter(fn($h) => str_contains($h->name, $keyword) || str_contains($h->address, $keyword))->values();
        }

        if (!empty($selectedAnimals)) {
            $hospitals = $hospitals->filter(function($h) use ($selectedAnimals) {
                return count(array_intersect($selectedAnimals, $h->supported_animals)) > 0;
            })->values();
        }

        return view('index', compact('hospitals', 'animals', 'selectedAnimals'));
    }

    /**
     * 動物病院の詳細を表示します。
     */
    public function detail(int $id): View
    {

        $animals = Species::all();
        $hospitals = Hospital::with('species', 'businessHours')->get();
        $hospital = $hospitals->firstWhere('id', $id);
        //dd($hospitals);

        $weeks = (object)[
            1 => '月曜日',
            2 => '火曜日',
            3 => '水曜日',
            4 => '木曜日',
            5 => '金曜日',
            6 => '土曜日',
            7 => '日曜日',
        ];
        if (!$hospital) {
            abort(404, '指定された病院は見つかりませんでした。');
        }

        return view('detail', compact('hospital', 'weeks'));
    }

    /**
     * ダミーデータを返す（共通化）
     */
    private function getHospitals(): Collection
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'さくら動物病院',
                'address' => '東京都目黒区自由が丘1-2-3',
                'phone' => '03-1234-5678',
                'consultation_hours' => '09:00-12:00, 16:00-19:00',
                'supported_animals' => ['犬', '猫'],
                'image_url' => 'https://via.placeholder.com/300x200.png?text=Hospital+A',
            ],
            (object)[
                'id' => 2,
                'name' => 'ひまわりペットクリニック',
                'address' => '東京都目黒区中目黒4-5-6',
                'phone' => '03-2345-6789',
                'consultation_hours' => '10:00-13:00, 15:00-18:00',
                'supported_animals' => ['犬', '猫', 'うさぎ', 'ハムスター'],
                'image_url' => 'https://via.placeholder.com/300x200.png?text=Hospital+B',
            ],
            (object)[
                'id' => 3,
                'name' => 'ABCどうぶつ医療センター',
                'address' => '東京都目黒区鷹番7-8-9',
                'phone' => '03-3456-7890',
                'consultation_hours' => '09:30-12:30, 16:30-19:30',
                'supported_animals' => ['犬', '猫', '鳥', 'その他'],
                'image_url' => 'https://via.placeholder.com/300x200.png?text=Hospital+C',
            ],
        ]);
    }

    private function getAnimals(): Collection
    {
        return collect([
            '犬', '猫', 'うさぎ', 'ハムスター', 'フェレット', '鳥類', '両生類', '爬虫類', 'その他'
        ]);
    }
}
