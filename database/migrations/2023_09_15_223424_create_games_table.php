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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('steam_appid')->index();
            $table->integer('relation_id')->nullable()->index();
            $table->string('name', 100)->index();
            $table->string('type', 20)->default('game')->index('type', 'gamesType');;
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('about')->nullable();
            $table->string('image', 200);
            $table->string('website', 200)->nullable();
            $table->integer('price_amount')->nullable();
            $table->string('price_currency', 3)->nullable();

            $table->string('metacritic_score', 10)->nullable()->index('games_metacritic_score_index');;
            $table->string('metacritic_url', 150)->nullable();
            $table->string('release_date', 30);
            $table->string('languages', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
