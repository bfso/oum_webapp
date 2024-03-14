<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->get('/test', function () {
    return response()->json(['message' => 'Hello, this is a test API!']);
});

Route::middleware('api')->get('/teams', function () {
    $teams = Team::all();
    return response()->json(['teams' => $teams]);
});