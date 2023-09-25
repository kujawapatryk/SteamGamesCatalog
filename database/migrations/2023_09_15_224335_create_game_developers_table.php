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
        Schema::create('gameDevelopers', function (Blueprint $table) {
            $table->integer('game_id')->index();
            $table->integer('developer_id')->index();

            $table->index(['game_id', 'developer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gameDevelopers');
    }
};
