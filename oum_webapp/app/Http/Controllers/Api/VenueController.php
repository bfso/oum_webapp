<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();

        return response()->json([
            'message' => 'Venues retrieved successfully',
            'venues' => $venues,
            'code' => 200
        ]);
    }

    public function show($id)
    {
        $venue = Venue::find($id);

        if (!$venue) {
            return response()->json([
                'message' => 'Venue not found',
                'code' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Venue found',
            'venue' => $venue,
            'code' => 200
        ]);
    }
}