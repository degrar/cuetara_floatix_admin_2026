<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Game;
use App\Models\User;
use Duplex\Enums\GameState;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Inertia\Inertia;
use Inertia\Response;

class GameController extends Controller
{
    const ITEMS_PER_PAGE = 25;

    public function show(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            //->leftJoin('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'showExportActions' => true,
            'tableHeader' => [
                'ID Part.',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'MMGG',
            ]
        ]);
    }

    public function pending(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Pending->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'date_moment', 'game_id']);
//            ->ddRawSql();

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'Momento Ganador',
                'Acciones'
            ]
        ]);
    }

    public function winners(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Winner->value)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'Momento Ganador',
                //'Acciones'
            ]
        ]);
    }

    public function awaiting(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Awaiting)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);


        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'Momento Ganador',
                'Acciones'
            ]
        ]);
    }

    public function losers(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Loser->value)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'Momento Ganador',
                //'Acciones'
            ]
        ]);
    }

    public function search(): JsonResponse
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg' => function ($query) {
            $query->select('game_id', 'date_moment');
        }])
            ->orderByDesc('games.created_at');

        if (request()->filled('idGame')) {
            $items->where('games.id', request('idGame'));
        }

        if (request()->filled('idUser')) {
            $items->where('games.user_id', request('idUser'));
        }

        if (request()->filled('email')) {
            $items->whereHas('user', function (Builder $query) {
                $query->where('email', 'like', '%' . request('email') . '%');
            });
        }

        return response()->json([
            'items' => $items->get(['games.*'])
        ]);
    }
}
