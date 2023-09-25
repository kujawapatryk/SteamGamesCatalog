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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id')->index();
            $table->integer('original_id')->index();
            $table->string('name', 80);
            $table->boolean('highlight');
            $table->string('thumbnail', 100);
            $table->string('webm_480', 100);
            $table->string('webm_url', 100);
            $table->string('mp4_480', 100);
            $table->string('mp4_url', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
