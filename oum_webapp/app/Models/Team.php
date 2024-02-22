<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    protected $fillable = ['name'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_teams', 'team_id', 'player_id');
    }
}
