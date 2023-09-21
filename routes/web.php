<?php

use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('', [GameController::class, 'dashboard'])
        ->name('games.dashboard');

Route::group([
    'prefix' => 'games',
    'namespace' => 'Game',
    'as' => 'games.'
], function () {

    Route::get('', [GameController::class, 'index'])
        ->name('list');

    Route::get('{game}', [GameController::class, 'showDetails'])
        ->name('show');


});

Route::group([
    'prefix' => 'user',
    'namespace' => 'User',
    'as' => 'user.'
], function () {
//    Route::get('profile', 'UserController@profile')
//        ->name('profile');
//
//    Route::get('edit', 'UserController@edit')
//        ->name('edit');
//
//    Route::post('update', 'UserController@update')
//        ->name('update');

    // listing, dodanie gry, usunięcie gry, ocena
    Route::get('games', [GameController::class, 'list'])->name('games.list');
    Route::post('games', [GameController::class, 'add'])->name('games.add');
    Route::delete('games', [GameController::class, 'remove'])->name('games.remove');
    Route::post('games/rete', [GameController::class, 'rate'])->name('games.rate');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
