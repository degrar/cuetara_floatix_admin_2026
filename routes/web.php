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
    use App\Http\Controllers\MoreInfoController;

    use Illuminate\Support\Facades\Storage;
    use Symfony\Component\HttpFoundation\StreamedResponse;

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

    Route::controller(MoreInfoController::class)->group(function (){
        Route::get('more-info/{token}', 'show')->name('more-info');
        Route::post('more-info/{token}', 'store');
        Route::get('thanks', 'thanks')->name('thanks');
    });

//    // Contact
//    Route::controller(ContactController::class)->group(function (){
//        Route::get('contacto', 'show')->name('contact');
//        Route::post('contacto', 'store');
//    });

    Route::get('legal', [LegalPrivacyController::class, 'legal'])->name('legal');
    Route::get('privacidad', [LegalPrivacyController::class, 'privacy'])->name('privacy');
    Route::get('cookies', [LegalPrivacyController::class, 'cookies'])->name('cookies');
    Route::get('faqs', [LegalPrivacyController::class, 'faqs'])->name('faqs');
    Route::get('nota-legal', [LegalPrivacyController::class, 'notaLegal'])->name('nota-legal');


});

Route::get('proximamente', [HomeController::class, 'start'])->name('proximamente');
Route::get('promo-finalizada', [HomeController::class, 'end'])->name('promo-finalizada');


Route::get('carta', function () {
    return response()->download(storage_path('app/carta.pdf'), 'carta.pdf', ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="carta_aceptacion.pdf"']);
})->name('carta');
//ADMIN

Route::get('mail', function () {
    return new App\Mail\Confirmed('1234567890');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'can:access-dashboard',
    //    new class implements
])->as('admin.')->prefix('dashboard')->group(function () {
    require __DIR__ . '/admin.php';
});

Route::any('{catchall}', [HomeController::class, 'notFound'])->name ('404');