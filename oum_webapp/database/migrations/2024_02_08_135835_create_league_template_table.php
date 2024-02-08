<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->string('team');
            $table->unsignedInteger('games_played');
            $table->unsignedInteger('wins');
            $table->unsignedInteger('draws');
            $table->unsignedInteger('losses');
            $table->unsignedInteger('goals_for');
            $table->unsignedInteger('goals_against');
            $table->integer('goal_difference');
            $table->unsignedInteger('points');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('league_template');
    }
};
