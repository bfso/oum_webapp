<?php

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Result;
use App\Models\Team;
use App\Http\Controllers\authController;
use App\Models\Player;

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


Route::post('v1/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $email = $request->email;
    $password = $request->password;


    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = Auth::user();

        $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'message' => 'Authentication successful',
            'token' => $success['token'],
            'username' => $user->name,
            'code' => '200'
        ], 200);
    } else {
        return response()->json([
            'message' => 'Invalid credentials',
            'code' => '401'
        ], 401);
    }

});


Route::middleware('auth:sanctum')->get('/v1/teams', function () {
    $teams = Team::all();
    return response()->json([
        'message' => 'These are the available Teams',
        'teams' => $teams,
        'code' => '200'
    ]);
});


Route::middleware('auth:sanctum')->get('/v1/players', function (Request $request) {
    $players = Player::all();
    return response()->json([
        'message' => 'These are the available Players',
        'players' => $players,
        'code' => 200
    ]);
});

Route::middleware('auth:sanctum')->get('/v1/players/{id}', function ($id) {
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
});

Route::middleware('auth:sanctum')->get('/v1/unplayed-games', function () {
    $unplayedGames = Game::whereNull('team_1_score')
        ->whereNull('team_2_score')
        ->get();

    return response()->json([
        'message' => 'Unplayed games retrieved successfully',
        'unplayed_games' => $unplayedGames,
        'code' => 200
    ]);
});

Route::middleware('auth:sanctum')->post('/v1/games/{id}/result', function ($id, Request $request) {
    $game = Game::find($id);

    if (!$game) {
        return response()->json([
            'message' => 'Spiel nicht gefunden',
            'code' => 404
        ], 404);
    }

    // Ergebnis des Spiels aktualisieren
    $game->update([
        'team_1_score' => $request->team_1_score,
        'team_2_score' => $request->team_2_score,
    ]);

    // Spielinformationen abrufen
    $team1Id = $game->team_1_id;
    $team2Id = $game->team_2_id;
    $team1Score = $game->team_1_score;
    $team2Score = $game->team_2_score;

    // Teams abrufen
    $team1 = Team::find($team1Id);
    $team2 = Team::find($team2Id);

    // Punkte berechnen und Teams aktualisieren
    if ($team1Score > $team2Score) {
        $team1->wins += 1;
        $team2->loses += 1;
        $team1->points += 3;
    } elseif ($team1Score < $team2Score) {
        $team1->loses += 1;
        $team2->wins += 1;
        $team2->points += 3;
    } else {
        $team1->draws += 1;
        $team2->draws += 1;
        $team1->points += 1;
        $team2->points += 1;
    }

    // Weitere Statistiken aktualisieren
    $team1->games += 1;
    $team1->goals += $team1Score;
    $team1->goals_conceded += $team2Score;

    $team2->games += 1;
    $team2->goals += $team2Score;
    $team2->goals_conceded += $team1Score;

    // Teams speichern
    $team1->save();
    $team2->save();

    return response()->json([
        'message' => 'Ergebnis erfolgreich aktualisiert und Teams aktualisiert',
        'code' => 200
    ], 200);
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
