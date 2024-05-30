<?php

    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\GameResultController;
    use App\Http\Controllers\LegalPrivacyController;
    use App\Http\Middleware\PromotionRedirect;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\GameController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

Route::middleware(PromotionRedirect::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');

    // Game
    Route::get('Game', [GameController::class, 'show']);
    Route::controller(GameController::class)->group(function (){
        Route::get('participa', 'show')->name('game');
        Route::post('participa', 'store');
    });

    // Game status
    Route::controller(GameResultController::class)->name('game-result.')->group(function () {
        Route::get('winner', 'winner')->name('winner');
        Route::get('lost', 'lost')->name('lost');
        Route::get('max', 'max')->name('max');
        Route::get('winners', 'winners')->name('winners');
    });

    // Contact
    Route::controller(ContactController::class)->group(function (){
        Route::get('contacto', 'show')->name('contact');
        Route::post('contacto', 'store');
    });

    Route::get('legal', [LegalPrivacyController::class, 'legal'])->name('legal');
    Route::get('privacidad', [LegalPrivacyController::class, 'privacy'])->name('privacy');


});

Route::get('proximamente', [HomeController::class, 'start'])->name('proximamente');
Route::get('promo-finalizada', [HomeController::class, 'end'])->name('promo-finalizada');


Route::any('{catchall}', [HomeController::class, 'notFound'])->name ('404');