<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
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
                'stats' => $this->getStats()
            ]);
        }

        private function getStats(): array
        {
            $usersSelect = DB::table('users')->selectRaw('COUNT(*)');

            return (array) DB::table('games')
                ->selectSub($usersSelect, 'users')
                ->selectRaw('COUNT(*) `games`')
                ->get()->first();
        }
    }
