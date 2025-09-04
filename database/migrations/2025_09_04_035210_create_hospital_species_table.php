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
        Schema::create('hospital_species', function (Blueprint $table) {    //対応種
            $table->id();
            $table->foreignId('hospital_id')->constrained();
            $table->foreignId('species_id')->constrained();
            $table->timestamps();

            // 同じ病院に同じ動物が重複して登録されるのを防ぐ
            $table->unique(['hospital_id', 'species_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_species');
    }
};
