<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    const ITEMS_PER_PAGE = 15;

    public function show(): Response
    {
        $items = User::orderByDesc('created_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return Inertia::render('Admin/Users', [
            'items' => $items,
            'tableHeader' => [
                'Nombre',
                'E-mail',
                'Tlf.',
                'BBDD',
                'Anuncios',
                'Fecha creación'
            ]
        ]);
    }
}
