<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use JetBrains\PhpStorm\NoReturn;

class LegalPrivacyController extends Controller
{
    public function legal()
    {
        return Inertia::render('Public/Legal');
    }

    #[NoReturn] public function privacy()
    {
        header('Location: https://www.kinder.com/es/es/politica-de-privacidad');
        die();
    }

    public function faqs()
    {
        return Inertia::render('Public/Legal');
    }
}
