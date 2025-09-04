<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_hours', function (Blueprint $table) {
            $table->id();
            // hospitalテーブルと連携するための外部キー
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            
            // 曜日のためのカラム (1:月曜, 2:火曜, ..., 7:日曜)
            $table->tinyInteger('day_of_week');
            
            // 1つの診療時間帯の開始時刻と終了時刻
            $table->time('start_time');
            $table->time('end_time');
            
            // 備考（例：「午前診療」「予約のみ」など）
            $table->string('note')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_hours');
    }
};
