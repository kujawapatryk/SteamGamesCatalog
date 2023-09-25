<?php

use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserGameController;
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
        ->name('dashboard');

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

Route::middleware(['auth'])->group(function() {

    Route::middleware(['can:admin-level'])->group(function () {
        Route::get('users', [UserController::class, 'list'])
            ->name('user.list');

        Route::get('users/{userId}', [UserController::class, 'show'])
            ->name('user.show');
    });

    Route::group([
        'prefix' => 'user',
        'namespace' => 'User',
        'as' => 'user.'
    ], function () {

        // listing, dodanie gry, usunięcie gry, ocena
        Route::get('games', [UserGameController::class, 'list'])->name('games.list');
        Route::post('games', [UserGameController::class, 'add'])->name('games.add');
        Route::delete('games', [UserGameController::class, 'remove'])->name('games.remove');
        Route::post('games/rete', [UserGameController::class, 'rate'])->name('games.rate');
    });

});

Route::middleware('auth')->group(function () {
    Route::post('profile/update', [ProfileController::class, 'avatar'])->name('avatar.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
