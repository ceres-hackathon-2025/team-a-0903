<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class HospitalController extends Controller
{
    /**
     * 動物病院一覧を表示します。
     */
    public function index(): View
    {
        $weeks = [
            '日曜日',
            '月曜日',
            '火曜日',
            '水曜日',
            '木曜日',
            '金曜日',
            '土曜日',
        ];


        $selectedAnimals = [];
        $animals = Species::all();
        $hospitals = Hospital::with('species', 'businessHours', 'hospitalImages')->get();

        $now = Carbon::now('Asia/Tokyo');
        $currentDay = $now->dayOfWeekIso;

        return view('index', compact('hospitals', 'animals', 'selectedAnimals', 'currentDay', 'weeks'));
    }
   

    /**
     * 病院の一覧を表示する
     */
    public function search(Request $request) // Requestオブジェクトを受け取る
    {

        $weeks = [
            '日曜日',
            '月曜日',
            '火曜日',
            '水曜日',
            '木曜日',
            '金曜日',
            '土曜日',
        ];

        // 1. ユーザーが入力したキーワードを取得
        $keyword = $request->input('keyword');

        // 2. 検索クエリを準備
        $query = Hospital::query();

        // 3. もしキーワードが入力されていれば、検索条件を追加
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('address', 'LIKE', "%{$keyword}%")
                  ->orWhere('post_code', 'LIKE', "%{$keyword}%");
            });
        }

        // 4. 動物種での絞り込み（ここが重要！）
        // Bladeから渡された動物IDを配列として受け取る
        $selectedAnimals = array_values($request->query('animal', []));

        // 配列が空でない（＝1つ以上チェックされている）場合のみ、絞り込み条件を追加
        if (!empty($selectedAnimals)) {
            // 'species'というリレーションを持っていて、
            // そのリレーション先のspeciesテーブルのidが、選択されたIDの配列に含まれている病院を検索
            $query->whereHas('species', function ($q) use ($selectedAnimals) {
                $q->whereIn('species.id', $selectedAnimals);
            });
        }

        // 5.「現在営業中」での絞り込み (ここからが追加部分)
        
        $now = Carbon::now('Asia/Tokyo');
        $currentDay = $now->dayOfWeekIso;      // 現在の曜日を取得 (月曜:1, ..., 日曜:7)
        $currentTime = $now->format('H:i'); // 現在の時刻を取得 ('HH:MM'形式)

        
        if (!empty($businessFlg)) {
            $query->whereHas('businessHours', function ($q) use ($currentDay, $currentTime) {
                $q->where('day_of_week', $currentDay)
                ->where('start_time', '<=', $currentTime)
                ->where('end_time', '>', $currentTime);
            });
        }


        // 6. データを取得し、ビューに渡す
        $hospitals = $query->latest()->get();
        $animals = Species::orderBy('id')->get();
        return view('index', compact('hospitals', 'animals', 'selectedAnimals', 'keyword', 'currentDay', 'weeks'));
    }


     /**
     * 動物病院の詳細を表示します。
     */
    public function detail(int $id): View
    {
        $hospitals = Hospital::with('species', 'businessHours')->get();
        $hospital = $hospitals->firstWhere('id', $id);

        $weeks = [
            '日曜日',
            '月曜日',
            '火曜日',
            '水曜日',
            '木曜日',
            '金曜日',
            '土曜日',
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
}
