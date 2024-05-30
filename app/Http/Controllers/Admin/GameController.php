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

class GameController extends Controller
{
    const ITEMS_PER_PAGE = 15;

    public function show(): Response
    {
        $items = Game::with(['user', 'files', 'prize' ,'product'])
            ->orderByDesc('created_at')
            ->paginate(self::ITEMS_PER_PAGE)
            ->through(function ($game) {
                // Añadir un valor calculado
                $game->isComplete = $game->isComplete();
                $game->hasAddress = $game->hasAddress();
                $game->getAddress =  $game->getAddress();
                return $game;
            });

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'tableHeader' => [
                'Nombre',
                'E-mail',
                'Fecha compra',
                'Producto',
                'Código',
                'Tipo',
            ]
        ]);
    }
}
