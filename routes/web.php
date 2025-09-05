<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController; 
use App\Http\Controllers\MapController;

Route::get('/', [HospitalController::class, 'index'])->name('index');
Route::get('/search', [HospitalController::class, 'search'])->name('search');
Route::get('/hospitals/{id}', [HospitalController::class, 'detail'])->name('detail');
// 例: /map/1 のようなURLでIDが1の店舗の地図を表示する
Route::get('/map/{shop}', [MapController::class, 'show'])->name('map.show');