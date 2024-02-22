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
        Schema::create('match_days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('venue_id');
            $table->timestamps();
        
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_days');
    }
};
