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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id(); // id BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('name');
            $table->string('post_code', 8)->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->text('homepage_url')->nullable();
            $table->text('googleMap_url')->nullable();
            $table->text('images')->nullable();
            $table->text('note')->nullable();
            $table->timestamps(); // created_at と updated_at カラムを作成
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
