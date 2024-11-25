<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Province;
use App\Models\Retailer;
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
            'retailers' => Retailer::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
            'products' => Product::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
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