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
            $table->unsignedBigInteger('match_day_id');
            $table->unsignedBigInteger('team_1_id');
            $table->unsignedBigInteger('team_2_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('team_1_score')->nullable();
            $table->integer('team_2_score')->nullable();
            $table->timestamps();
        
            $table->foreign('match_day_id')->references('id')->on('match_days')->onDelete('cascade');
            $table->foreign('team_1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_2_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
