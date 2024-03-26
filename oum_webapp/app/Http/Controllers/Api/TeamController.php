<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return response()->json([
            'message' => 'These are the available Teams',
            'teams' => $teams,
            'code' => 200
        ]);
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json([
                'message' => 'Team not found',
                'code' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Team found',
            'team' => $team,
            'code' => 200
        ]);
    }
}