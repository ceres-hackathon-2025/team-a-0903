<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB; // (例) データベースを使用する場合

class HospitalController extends Controller
{
    /**
     * 動物病院一覧を表示します。
     */
    public function index(): View
    {
        // 実際にはデータベースから取得しますが、ここではダミーデータを使用します。
        $hospitals = collect([
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
                'supported_animals' => ['犬', '猫', '鳥', 'エキゾチック'],
                 'image_url' => 'https://via.placeholder.com/300x200.png?text=Hospital+C',
            ],
        ]);

        return view('hospitals.index', compact('hospitals'));
    }
}