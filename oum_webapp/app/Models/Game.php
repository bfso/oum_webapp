<?php

// app/Models/Game.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['match_day_id', 'home_team_id', 'away_team_id', 'home_team_score', 'away_team_score']; // Füge 'match_day_id' zum $fillable-Array hinzu

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}