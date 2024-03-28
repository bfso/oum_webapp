<?php

// app/Models/Game.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['match_day_id', 'team_1_id', 'team_2_id', 'team_1_score', 'team_2_score', 'category_id'];

}