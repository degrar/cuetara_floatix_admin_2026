<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class GameResultController extends Controller
{
    public function winner(): Response
    {
        return Inertia::render('Public/Game/Winner');
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
