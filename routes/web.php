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


    Route::any('{any}', function () {
        return redirect()->route('admin.dashboard');
    })->where('any', '.*');