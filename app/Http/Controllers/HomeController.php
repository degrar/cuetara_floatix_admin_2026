<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */
    public function __invoke() : Response
    {
        return Inertia::render('Public/Home', [
            'site_key' => config('duplex.recaptcha.public'),

        ]);
    }

    public function notFound(){
        return Inertia::render('Public/404');
    }

    public function start(){
        return Inertia::render('Public/PromoStart');
    }

    public function end(){
        return Inertia::render('Public/PromoEnd');
    }

}