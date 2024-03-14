<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'team_id',
        'opponent_id',
        'result', // z.B. 'win', 'loss', 'draw'
        'goals_for',
        'goals_against',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function opponent()
    {
        return $this->belongsTo(Team::class, 'opponent_id');
    }
}
