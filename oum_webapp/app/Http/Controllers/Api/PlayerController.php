<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return response()->json([
            'message' => 'These are the available Players',
            'players' => $players,
            'code' => 200
        ]);
    }

    public function show($id)
    {
        $player = Player::find($id);
        if (!$player) {
            return response()->json([
                'message' => 'Player not found',
                'code' => 404
            ], 404);
        }
        return response()->json([
            'message' => 'Player found',
            'player' => $player,
            'code' => 200
        ], 200);
    }
}