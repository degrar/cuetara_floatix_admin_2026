<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Stock;
    use DB;
    use Illuminate\Http\Request;
    use Inertia\Inertia;
    use Inertia\Response;

    class DashboardController extends Controller
    {
        public function show(): Response
        {

            return Inertia::render('Admin/Dashboard', [
                'recent_login' => session('recent_login'),
                'stats' => $this->getStats(),
                'start_date' => config('duplex.promo.date.start'),
                'end_date' => config('duplex.promo.date.end'),
                'timezone' => config('duplex.promo.date.timezone'),
                'attempts_day' => config('duplex.promo.attemps.day'),
                'attempts_total' => config('duplex.promo.attemps.total'),
                'stock' => Stock::query()->orderBy('id')->get(['id', 'name', 'units', 'used']),
                ]);
        }

        private function getStats(): array
        {
            $usersSelect = DB::table('users')->where('role', '=', 'user')->selectRaw('COUNT(*)');

            return (array) DB::table('games')
                ->selectSub($usersSelect, 'users')
                ->selectRaw('COUNT(*) `games`')
                ->get()->first();
        }
    }
