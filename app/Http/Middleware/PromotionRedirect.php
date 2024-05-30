<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Duplex\Enums\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Carbon $startDate */
        $start = config('duplex.promo.date.start');
        /** @var Carbon $startDate */
        $end = config('duplex.promo.date.end');

        $now = now();

        if ($now->lt($start) && !$request->route()->named(  'legal', 'privacy')) return redirect()->route(Route::PromoSoon->value);

        if ($now->gt($end) && !$request->route()->named('contact','legal', 'privacy')) return redirect()->route(Route::PromoEnded->value);

        return $next($request);
    }
}
