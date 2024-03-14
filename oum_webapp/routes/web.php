<?php

use App\Http\Controllers\GameOperationController;
use App\Http\Controllers\ProfileController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AdminController;
use App\Models\Category;
use App\Models\Venue;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/association', function () {
    return view('association');
})->middleware(['auth', 'verified'])->name('association');




Route::get('/gameoperation', function () {
    $categories = Category::pluck('name')->toArray();
    return view('gameoperation', compact('categories'));
})->middleware(['auth', 'verified'])->name('gameoperation');




Route::get('/history', function () {
    return view('history');
})->middleware(['auth', 'verified'])->name('history');

Route::get('/referee', function () {
    return view('referee');
})->middleware(['auth', 'verified'])->name('referee');

Route::get('/associationmember', function () {
    return view('associationmember');
})->middleware(['auth', 'verified'])->name('associationmember');

Route::get('/gameoperation', function () {
    $categories = Category::pluck('name')->toArray();

    return view('gameoperation', compact('categories'));
})->middleware(['auth', 'verified'])->name('associationmember');

Route::middleware('auth')->group(function () {
    Route::get('/edit', [AdminController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::post('/players', [AdminController::class, 'storePlayer'])->name('admin.players.store');
    Route::post('/teams', [AdminController::class, 'storeTeam'])->name('admin.teams.store');
    Route::get('/gameoperation/{league}', [GameOperationController::class, 'index'])->name('gameoperation');

    
    Route::delete('/teams/{id}', [AdminController::class, 'destroyTeam'])->name('admin.teams.destroy');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');
    Route::post('/venues', [AdminController::class, 'storeVenue'])->name('admin.venues.store');
    Route::delete('/venues/{venue}', [AdminController::class, 'destroyVenue'])->name('admin.venues.destroy');

});

require __DIR__ . '/auth.php';