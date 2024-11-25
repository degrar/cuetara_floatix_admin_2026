<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use JetBrains\PhpStorm\NoReturn;

class LegalPrivacyController extends Controller
{
    public function legal(): Response
    {
        return Inertia::render('Public/Legal');
    }

    public function privacy(): Response
    {
        return Inertia::render('Public/Privacy');
    }

    public function faqs(): Response
    {
        return Inertia::render('Public/Faqs');
    }
}
