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

        // Bestimme den Rang für jedes Team basierend auf den Punkten und der Tordifferenz
        $rank = 1;
        $prevPoints = null;
        $prevGoalDifference = null;

        foreach ($teams as $team) {
            if ($prevPoints !== null && ($team->points != $prevPoints || $team->goal_difference != $prevGoalDifference)) {
                $rank++;
            }

            $team->rank = $rank;
            $prevPoints = $team->points;
            $prevGoalDifference = $team->goal_difference;
        }

        return view('gameoperation', compact('league', 'teams', 'categories'));
    }

    private function getDataForLeague($league)
    {
        return Team::select('teams.*')
            ->selectRaw('(teams.goals - teams.goals_conceded) as goal_difference') 
            ->join('categories', 'teams.category_id', '=', 'categories.id')
            ->where('categories.name', $league)
            ->orderByDesc('teams.points') 
            ->orderByDesc('goal_difference') 
            ->get();
    }
}
