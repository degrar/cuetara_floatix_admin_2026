<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
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
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid', 'mmgg'])
            ->leftJoin('mmggs', 'games.user_id', '=', 'mmggs.user_id')
            ->join('users', 'games.user_id', '=', 'users.id')
            ->where('role', '=', 'user')
            ->orderBy('games.created_at', 'asc')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*', 'game_id']);

        //dd($items);

        return Inertia::render('Admin/Games', [
            'items' => $items,
            'hideActions' => true,
            'showExportActions' => true,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Datos de participación',
                'Fechas',
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
            //->ddRawSql();
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
                'Premio/MMGG',

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
            'hideActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'Premio/MMGG',
                'Acciones'
            ]
        ]);
    }

    public function awaiting(): Response //Validat el pack pendent de validar documentació personal
    {
        $items = Game::with(['user', 'files:id,hash,game_id,type,is_valid', 'mmgg', 'address', 'address.via:id,name', 'address.province:id,name', 'platform'])
            ->where('state', GameState::Awaiting->value)
            ->leftJoin('addresses', 'games.user_id', '=', 'addresses.user_id')
            ->orderByDesc('games.created_at')
            ->paginate(self::ITEMS_PER_PAGE, ['games.*']);


        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => false,
            'pack' => false,
            'personalImage' => true,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Archivos',
                'Datos de participación',
                'Fechas',
                'Premio',
                'Acciones',

            ],

        ]);
    }
    public function winners(): Response // (adreça Flotix)
    {

        $items = Claim::with(['user', 'address', 'address.via:id,name', 'address.province:id,name'])
            ->orderByDesc('claims.created_at')
            ->paginate(self::ITEMS_PER_PAGE);


        return Inertia::render('Admin/GamesAddress', [
            'items' => $items,
            'hideActions' => true,
            'pack' => false,
            'personalImage' => false,
            'showExportActions' => false,
            'tableHeader' => [
                'ID Participación',
                'Usuario',
                'Datos de participación',
                'Fechas',
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
                'Premio',
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
