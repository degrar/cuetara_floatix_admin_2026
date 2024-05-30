<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingController extends Controller
{
    public function show()
    {
        return Inertia::render('Admin/Settings', [
            'stats' => $this->stats()
        ]);
    }

    private function stats(): array
    {
        $usersSelect = \DB::table('users')->selectRaw('COUNT(*)');

        return (array) \DB::table('games')
            ->selectSub($usersSelect, 'users')
            ->selectRaw('COUNT(*) `games`')
            ->get()->first();
    }
}
