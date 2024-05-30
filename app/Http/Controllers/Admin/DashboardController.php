<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
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
            'charts' => [
                'games' => $this->getDailyParticipations(),
                'users' => $this->getDailyUsers()
            ]
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

    private function getDailyParticipations(): array
    {
        return Game::selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') `time`, count(*) `value`")
            ->groupByRaw('time')
            ->get()->toArray();
    }

    private function getDailyUsers(): array
    {
        return User::selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') `time`, count(*) `value`")
            ->groupByRaw('time')
            ->get()->toArray();
    }
}
