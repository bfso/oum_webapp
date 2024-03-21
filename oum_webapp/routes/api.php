<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Result;
use App\Models\Team;
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
Route::middleware('auth:sanctum')->post('/results', function (Request $request) {
   
    $user = $request->user();
    

    
    $requestData = $request->validate([
        'team_id' => 'required|integer|exists:teams,id',
        'opponent' => 'required|string',
        'goals' => 'required|integer',
        'goals_conceded' => 'required|integer',
        
    ]);

    
    $result = Result::create([
        'team_id' => $requestData['team_id'],
        'opponent' => $requestData['opponent'],
        'goals' => $requestData['goals'],
        'goals_conceded' => $requestData['goals_conceded'],
        
    ]);

    

    return response()->json(['message' => 'Result submitted successfully'], 201);
});

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/teams', function () {
    $teams = Team::all();
    return response()->json(['teams' => $teams]);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $email = $request->email;
    $password = $request->password;


    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = Auth::user();
        return response()->json([
            'message' => 'Authentication successful',
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