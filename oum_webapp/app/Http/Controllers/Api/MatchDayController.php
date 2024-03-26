<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchDay;

class MatchDayController extends Controller
{
    public function index()
    {
        $matchDays = MatchDay::all();

        return response()->json([
            'message' => 'Match days retrieved successfully',
            'match_days' => $matchDays,
            'code' => 200
        ]);
    }

    public function show($id)
    {
        $matchDay = MatchDay::find($id);

        if (!$matchDay) {
            return response()->json([
                'message' => 'Match day not found',
                'code' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Match day retrieved successfully',
            'match_day' => $matchDay,
            'code' => 200
        ]);
    }
}