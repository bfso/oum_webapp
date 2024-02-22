<?php

use App\Http\Controllers\GameOperationController;
use App\Http\Controllers\ProfileController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AdminController;

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


Route::get('/edit', function () {
    $teams = Team::all();
    return view('edit', compact('teams'));
})->middleware(['auth', 'verified'])->name('edit');


Route::get('/association', function () {
    return view('association');
})->middleware(['auth', 'verified'])->name('association');


Route::get('/gameoperation', function () {
    return view('gameoperation');
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::get('/players/create', [AdminController::class, 'createPlayer'])->name('admin.players.create');
    Route::post('/players', [AdminController::class, 'storePlayer'])->name('admin.players.store');
});

require __DIR__.'/auth.php';

Route::get('/gameoperation/{league}', [GameOperationController::class, 'index'])->name('gameoperation');


