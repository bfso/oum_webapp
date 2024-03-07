<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game; // Hier habe ich Game eingefügt

class Category extends Model
{
    
    protected $fillable = ['name'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function matches()
    {
        // Rufe alle Spiele ab, deren Heim- oder Auswärtsteam in den Teams dieser Kategorie liegt
        return Game::whereHas('homeTeam', function ($query) {
                $query->whereIn('team_id', $this->teams->pluck('id'));
            })
            ->orWhereHas('awayTeam', function ($query) {
                $query->whereIn('team_id', $this->teams->pluck('id'));
            })
            ->get();
    }
}
