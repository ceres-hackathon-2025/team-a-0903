<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function show(Hospital $hospital)
    {
        // データベースから取得した住所
        $address = $hospital->address;

        // configファイルからAPIキーを取得
        $apiKey = config('services.google-map.key');

        // 住所とAPIキーをビューに渡す
        return view('map.show', compact('address', 'apiKey'));
    }
}
