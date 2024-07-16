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
    const ITEMS_PER_PAGE = 25;

    public function show(): Response
    {
        $items = User::orderBy('created_at', 'asc')
            ->where('role', '!=', 'admin')
            ->paginate(self::ITEMS_PER_PAGE);

        return Inertia::render('Admin/Users', [
            'items' => $items,
            'tableHeader' => [
                'ID',
                'Nombre',
                'E-mail',
                'Anuncios',
                'Fecha creación'
            ]
        ]);
    }
}
