<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon; // Carbonをインポート

class HospitalController extends Controller
{
    /**
     * 動物病院一覧を表示します。
     */
    public function index(): View
    {
        // --- ▼▼▼ 現在時刻と曜日を取得する処理 ▼▼▼ ---
        $now = Carbon::now();
        $dayOfWeek = $now->dayOfWeek;       
        $currentTime = $now->format('H:i'); 
        // --- ▲▲▲ ここまで ▲▲▲ ---

        // データベースから全ての病院と動物の情報を取得します
        $hospitals = Hospital::with('businessHours', 'species')->get();
        $animals = Species::all();
        $selectedAnimals = [];

        // 取得したデータをビューに渡します
        return view('index', compact('hospitals', 'animals', 'selectedAnimals'));
    }

    /**
     * 検索機能
     */
    public function search(Request $request): View
    {
        $keyword = $request->input('keyword', '');
        $selectedAnimals = $request->input('animal', []);

        $query = Hospital::with('businessHours', 'species');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        if (!empty($selectedAnimals)) {
            $query->whereHas('species', function ($q) use ($selectedAnimals) {
                $q->whereIn('species.id', $selectedAnimals);
            });
        }

        $hospitals = $query->get();
        $animals = Species::all();

        return view('index', compact('hospitals', 'animals', 'selectedAnimals'));
    }

    /**
     * 動物病院の詳細を表示します。
     */
    public function detail(int $id): View
    {
        $hospital = Hospital::findOrFail($id);
        return view('detail', compact('hospital'));
    }
}