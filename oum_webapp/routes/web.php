<?php

use App\Http\Controllers\GameOperationController;
use App\Http\Controllers\ProfileController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AdminController;
use App\Models\Category;
use App\Models\Venue;
use App\Models\Match;
use App\Models\MatchDay;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/association', function () {
    return view('association');
})->name('association');




Route::get('/gameoperation', function () {
    $categories = Category::pluck('name')->toArray();
    return view('gameoperation', compact('categories'));
})->name('gameoperation');




Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/referee', function () {
    return view('referee');
})->name('referee');

Route::get('/associationmember', function () {
    return view('associationmember');
})->name('associationmember');

Route::get('/gameoperation', function () {
    $categories = Category::pluck('name')->toArray();

    return view('gameoperation', compact('categories'));
})->name('associationmember');

Route::middleware('auth')->group(function () {
    Route::get('/edit', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::post('/players', [AdminController::class, 'storePlayer'])->name('admin.players.store');
    Route::post('/teams', [AdminController::class, 'storeTeam'])->name('admin.teams.store');
    Route::get('/gameoperation/{league}', [GameOperationController::class, 'index'])->name('gameoperation');
    Route::post('/venues', [AdminController::class, 'storeVenue'])->name('admin.venues.store');
    Route::post('/generateMatches', [AdminController::class, 'generateMatches'])->name('admin.generateMatches');

    
    Route::delete('/teams/{id}', [AdminController::class, 'destroyTeam'])->name('admin.teams.destroy');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');
    Route::delete('/venues/{venue}', [AdminController::class, 'destroyVenue'])->name('admin.venues.destroy');

});

require __DIR__ . '/auth.php';