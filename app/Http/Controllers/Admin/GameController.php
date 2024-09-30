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
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid'])
            ->leftJoin('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('users', 'games.user_id', '=', 'users.id')
            ->where('role', '=', 'user')
            ->orderBy('games.created_at', 'asc')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'game_id']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'showExportActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'MMGG',
            ]
        ]);
    }

    public function pending(): Response //MMGG pendent de validar imatge
    {
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid', 'mmgg'])
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
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'MMGG',
                'Acciones'
            ]
        ]);
    }

    public function requested(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid', 'mmgg'])
            ->where('state', GameState::Requested->value)
            ->orWhere('state', GameState::Valid->value)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'MMGG',
                //'Acciones'
            ]
        ]);
    }

    public function awaiting(): Response //Validat el pack pendent de validar documentació personal
    {
        $items = Game::with(['user', 'address', 'address.via:id,name', 'address.province:id,name'])
            ->where('state', GameState::Awaiting->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('addresses', 'games.user_id', '=', 'addresses.user_id')
            ->leftJoin('stocks as stock1', 'games.size1', '=', 'stock1.id')
            ->leftJoin('stocks as stock2', 'games.size2', '=', 'stock2.id')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'date_moment', 'games.id', 'stock1.name as size1',
                'stock2.name as size2']);


        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => false,
            'pack' => false,
            'personalImage' => false,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Jerseis',
                'Dirección',
                'Fecha de participación',
                'Acciones'
            ],

        ]);
    }
    public function winners(): Response //TOT ESTÀ VALIDAT (adreça, dni i pack)
    {

        $items = Game::with(['user', 'address', 'address.via:id,name', 'address.province:id,name'])
            ->where('state', GameState::Winner->value)
            ->join('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('addresses', 'games.user_id', '=', 'addresses.user_id')
            ->leftJoin('stocks as stock1', 'games.size1', '=', 'stock1.id')
            ->leftJoin('stocks as stock2', 'games.size2', '=', 'stock2.id')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'date_moment', 'games.id', 'stock1.name as size1',
                'stock2.name as size2']);


        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => true,
            'pack' => false,
            'personalImage' => false,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Información Usuario',
                'Jerseis',
                'Dirección',
                'Fecha de participación',
                //'Acciones'
            ],

        ]);

    }



    public function denied(): Response
    {
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid', 'mmgg'])
            ->where('state', GameState::Denied->value)
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => false,
            'pack' => false,
            'personalImage' => false,
            'reload' => true,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'MMGG',
                'Acciones'
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
