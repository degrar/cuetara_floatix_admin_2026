<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class GameResultController extends Controller
{
    public function winner()
    {
        if (Session::has('winner')) {
        //$token = '1234567890';
        //$prize = 1;
            $token = Session::get('token');
            $prize = Session::get('prize');
            return Inertia::render('Public/Game/Winner', ['token' => $token, 'prize' => $prize]);
        }
        return redirect()->route('home');
    }

    public function lost(): Response
    {
        return Inertia::render('Public/Game/Lost');
    }

    public function max(): Response
    {
        return Inertia::render('Public/Game/Max');
    }
}
