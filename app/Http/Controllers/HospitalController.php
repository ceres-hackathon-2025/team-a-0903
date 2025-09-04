<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class HospitalController extends Controller
{
    /**
     * 動物病院一覧を表示します。
     */
    public function index(Request $request): View
    {
        $keyword = $request->query('keyword', '');
        $selectedAnimals = $request->query('animal', []);

        $hospitals = $this->getHospitals();

        if ($keyword) {
            $hospitals = $hospitals->filter(fn($h) => str_contains($h->name, $keyword) || str_contains($h->address, $keyword))->values();
        }

        if (!empty($selectedAnimals)) {
            $hospitals = $hospitals->filter(function($h) use ($selectedAnimals) {
                return count(array_intersect($selectedAnimals, $h->supported_animals)) > 0;
            })->values();
        }

        return view('index', compact('hospitals'));
    }

    /**
     * 動物病院の詳細を表示します。
     */
    public function detail(int $id): View
    {
        $hospitals = $this->getHospitals();
        $hospital = $hospitals->firstWhere('id', $id);

        if (!$hospital) {
            abort(404, '指定された病院は見つかりませんでした。');
        }

        return view('detail', compact('hospital'));
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
}
