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
            Session::remove('winner');
            return Inertia::render('Public/Game/Winner');
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
