<?php

use App\Actions\Admin\ChangeGameState;
use App\Actions\Admin\ExportGames;
use App\Http\Controllers\Admin\{DashboardController,
    SettingController,
    UserController,
    GameController,
    FileController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
Route::get('/users', [UserController::class, 'show'])->name('users');
Route::get('/messages', [DashboardController::class, 'show'])->name('messages');

Route::as('games.')->prefix('games')->group(function () {
    Route::get('/', [GameController::class, 'show'])->name('home');
    Route::get('winners', [GameController::class, 'winners'])->name('winners');
    Route::get('pending', [GameController::class, 'pending'])->name('pending');
    Route::get('denied', [GameController::class, 'denied'])->name('denied');
    Route::get('awaiting', [GameController::class, 'awaiting'])->name('awaiting');
    Route::get('requested', [GameController::class, 'requested'])->name('requested');
    Route::get('search', [GameController::class, 'search'])->name('search');

    Route::patch('/state/{game}/{action}', ChangeGameState::class)->name('state');

    Route::get('export', ExportGames::class)->name('export');
});

Route::as('files.')->prefix('files')->group(function() {
    Route::get('/image/{id?}', [FileController::class, 'image'])->name('image');
    Route::get('/pdf/{id?}', [FileController::class, 'image'])->name('pdf');
});

Route::middleware('can:is-admin')->group(function (){
    Route::prefix('settings')->as('settings.')->group(function() {
        Route::get('/', [SettingController::class, 'show'])->name('home');
        Route::get('/legal', [SettingController::class, 'legal'])->name('legal');
        Route::post('/legal', [SettingController::class, 'legalStore']);

        Route::get('emails', [SettingController::class, 'emails'])->name('emails');
    });

    Route::name('logs')->get('/logs', fn() => redirect(url('/log-viewer')));
});
