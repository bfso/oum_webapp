<?php

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Result;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\GameResultController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\MatchDayController;
use App\Http\Controllers\Api\VenueController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/v1/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {


    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/player/{id}', [PlayerController::class, 'show']);


    Route::get('/teams', [TeamController::class, 'index']);
    Route::get('/team/{id}', [TeamController::class, 'show']);


    Route::post('/games/{id}/result', [GameResultController::class, 'updateResult']);


    Route::get('/unplayed-games', [GameController::class, 'getUnplayedGames']);
    Route::get('/played-games', [GameController::class, 'getPlayedGames']);


    Route::get('/match-days', [MatchDayController::class, 'index']);
    Route::get('/match-day/{id}', [MatchDayController::class, 'show']);

    Route::get('/venues', [VenueController::class, 'index']);
    Route::get('/venue/{id}', [VenueController::class, 'show']);
    
});
















































// Route::middleware('auth:sanctum')->post('/results', function (Request $request) {

//     $user = $request->user();



//     $requestData = $request->validate([
//         'team_id' => 'required|integer|exists:teams,id',
//         'opponent' => 'required|string',
//         'goals' => 'required|integer',
//         'goals_conceded' => 'required|integer',

//     ]);


//     $result = Result::create([
//         'team_id' => $requestData['team_id'],
//         'opponent' => $requestData['opponent'],
//         'goals' => $requestData['goals'],
//         'goals_conceded' => $requestData['goals_conceded'],

//     ]);



//     return response()->json(['message' => 'Result submitted successfully'], 201);
// });
