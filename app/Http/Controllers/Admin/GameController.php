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
    const ITEMS_PER_PAGE = 100;

    public function show(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            //->leftJoin('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->orderBy('games.created_at', 'asc')
            ->paginate(self::ITEMS_PER_PAGE);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'showExportActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Fecha de participación',
                'MMGG',
            ]
        ]);
    }

    public function pending(): Response //MMGG pendent de validar pack
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Pending->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->orderBy('games.created_at', 'asc')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'date_moment', 'game_id']);
//            ->ddRawSql();

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'pack' => true,
            'personalImage' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de participación',
                'Momento Ganador',
                'Acciones',
            ]
        ]);
    }

    public function requested(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Valid->value)
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
                'Fecha de validación',
                //'Acciones'
            ]
        ]);
    }

    public function awaiting(): Response //Validat el pack pendent de validar documentació personal
    {
        $items = Game::with(['user', 'files' => function($query) {$query->select('id', 'hash', 'game_id')->where('type', 3);}, 'address', 'address.via:id,name', 'address.province:id,name'])
            ->where('state', GameState::Awaiting->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('addresses', 'games.user_id', '=', 'addresses.user_id')
            ->join('files', 'games.id', '=', 'files.game_id')
            ->where('files.type', '=', '3')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'date_moment', 'games.id']);


        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => false,
            'pack' => false,
            'personalImage' => false,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'DNI',
                'Dirección',
                'Fecha de participación',
                'Acciones'
            ],

        ]);
    }
    public function winners(): Response //TOT ESTÀ VALIDAT (adreça, dni i pack)
    {
//        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
//            ->where('state', GameState::Winner->value)
//            ->orderByDesc('games.created_at')
//            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        $items = Game::with(['user', 'files:id,hash,game_id', 'address', 'address.via:id,name', 'address.province:id,name'])
            ->where('state', GameState::Winner->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('addresses', 'games.user_id', '=', 'addresses.user_id')
            ->join('files', 'games.id', '=', 'files.game_id')
            ->where('files.type', '=', '3')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => true,
            'pack' => false,
            'personalImage' => false,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Dirección',
                'Fecha de confirmación',
                //'Acciones'
            ]
        ]);
    }



    public function denied(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id', 'mmgg'])
            ->where('state', GameState::Denied->value)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Archivos',
                'Fecha de validación',
                'Motivo rechazo',
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
