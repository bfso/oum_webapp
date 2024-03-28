<?php

// app/Models/Game.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['match_day_id', 'team_1_id', 'team_2_id', 'team_1_score', 'team_2_score', 'category_id'];

    public function showResults($category)
    {
        $games = Game::where('category_id', $category->id)->get();

        return view('game_results', compact('games'));
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }

}