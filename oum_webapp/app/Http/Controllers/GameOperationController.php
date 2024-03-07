<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Team;

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
        // Annahme: Es gibt eine Beziehung zwischen Team und Kategorie
        return Team::select('teams.*')
            ->selectRaw('(teams.goals - teams.goals_conceded) as goal_difference') // Berechne die Tordifferenz
            ->join('categories', 'teams.category_id', '=', 'categories.id')
            ->where('categories.name', $league)
            ->orderByDesc('teams.points') // Zuerst nach Punkten sortieren
            ->orderByDesc('goal_difference') // Dann nach Tordifferenz sortieren
            ->get();
    }
}
