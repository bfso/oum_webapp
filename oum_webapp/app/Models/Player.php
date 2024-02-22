<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'player_nr', 'license_nr', 'img', 'presence'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_teams', 'player_id', 'team_id');
    }
}
