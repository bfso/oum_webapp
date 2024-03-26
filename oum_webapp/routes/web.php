<?php

use App\Http\Controllers\GameOperationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Category;
use App\Http\Controllers\AdminDashboard\CategoryController;
use App\Http\Controllers\AdminDashboard\MatchDayController;
use App\Http\Controllers\AdminDashboard\PlayerController;
use App\Http\Controllers\AdminDashboard\TeamController;
use App\Http\Controllers\AdminDashboard\VenueController;



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


//Navbar
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


Route::get('/gameoperation/{league}', [GameOperationController::class, 'index'])->name('gameoperation');



Route::middleware('auth')->group(function () {

    // Admin profile
    Route::get('/edit', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Admin dashboard
    Route::post('/categories', [CategoryController::class, 'storeCategory'])->name('admin.categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroyCategory'])->name('admin.categories.destroy');

    Route::post('/teams', [TeamController::class, 'storeTeam'])->name('admin.teams.store');
    Route::delete('/teams/{id}', [TeamController::class, 'destroyTeam'])->name('admin.teams.destroy');

    Route::post('/players', [PlayerController::class, 'storePlayer'])->name('admin.players.store');

    Route::post('/venues', [VenueController::class, 'storeVenue'])->name('admin.venues.store');
    Route::delete('/venues/{venue}', [VenueController::class, 'destroyVenue'])->name('admin.venues.destroy');

    Route::post('/generateMatches', [MatchDayController::class, 'generateMatches'])->name('admin.generateMatches');

});

require __DIR__ . '/auth.php';