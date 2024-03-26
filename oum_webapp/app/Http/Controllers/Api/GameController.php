<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function getUnplayedGames()
    {
        $unplayedGames = Game::whereNull('team_1_score')
            ->whereNull('team_2_score')
            ->get();

        return response()->json([
            'message' => 'Unplayed games retrieved successfully',
            'unplayed_games' => $unplayedGames,
            'code' => 200
        ]);
    }

    public function getPlayedGames()
    {
        $playedGames = Game::whereNotNull('team_1_score')
            ->whereNotNull('team_2_score')
            ->get();

        return response()->json([
            'message' => 'Played games retrieved successfully',
            'played_games' => $playedGames,
            'code' => 200
        ]);
    }
}