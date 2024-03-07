<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Team;
use App\Models\Point; // Importiere das Point-Modell

class GameOperationController extends Controller
{
    public function index($league)
    {
        $teams = $this->getDataForLeague($league);
        $categories = Category::pluck('name')->toArray();
        return view('gameoperation', compact('league', 'teams', 'categories'));
    }

    private function getDataForLeague($league)
    {
        return Team::select('teams.*', 'points.points')
            ->join('points', 'teams.id', '=', 'points.team_id')
            ->join('categories', 'points.category_id', '=', 'categories.id')
            ->where('categories.name', $league)
            ->orderByDesc('points.points')
            ->orderByDesc('points.goal_difference') // Dann nach Tordifferenz sortieren
            ->get();
    }
}
