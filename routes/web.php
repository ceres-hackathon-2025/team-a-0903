<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController; 

Route::get('/', [HospitalController::class, 'index'])->name('index');
Route::get('/search', [HospitalController::class, 'index'])->name('search');
Route::get('/hospitals/{id}', [HospitalController::class, 'detail'])->name('detail');
