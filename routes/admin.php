<?php

use App\Actions\Admin\ExportGames;
use App\Actions\Admin\ExportUsers;
use App\Http\Controllers\Admin\{DashboardController,
    SettingController,
    SettingsController,
    UserController,
    GameController,
    FileController};
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckJsonResultsController;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

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
Route::get('/games', [GameController::class, 'show'])->name('games');
Route::get('/games/export', ExportGames::class)->name('games.export');
Route::get('/users/export', ExportUsers::class)->name('users.export');
Route::get('/messages', [DashboardController::class, 'show'])->name('messages');

Route::as('files.')->prefix('files')->group(function() {
    Route::get('/image/{id?}', [FileController::class, 'image'])->name('image');
    Route::get('/pdf/{id?}', [FileController::class, 'image'])->name('pdf');
});

Route::middleware('can:is-admin')->group(function (){
    Route::get('/settings', [SettingController::class, 'show'])->name('settings');
    Route::name('logs')->get('/logs', fn() => redirect(url('/log-viewer')));
    //Route::get('health', HealthCheckResultsController::class)->name('health');
    //Route::get('health-json', HealthCheckJsonResultsController::class)->name('health-json');
});
