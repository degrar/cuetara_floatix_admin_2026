<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;

    use App\Models\Claim;
    use App\Models\Stock;
    use DB;
    use Illuminate\Http\Request;
    use Inertia\Inertia;
    use Inertia\Response;

    class DashboardController extends Controller
    {
        public function show(): Response
        {

            $items = Stock::Select('type', 'name', 'total', 'claimed')
                ->orderBy('type')
                ->orderBy('name')
                ->get();

            return Inertia::render('Admin/Dashboard', [
                'recent_login' => session('recent_login'),
                'stats' => $this->getStats(),
                'items' => $items,
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
