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
        Schema::create('player_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('team_id');
            // Hier könntest du weitere Spalten hinzufügen, um zusätzliche Informationen über die Zuordnung zu speichern
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_teams');
    }
};
