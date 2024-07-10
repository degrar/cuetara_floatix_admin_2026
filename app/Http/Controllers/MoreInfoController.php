<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameWinnerRequest;
use App\Models\Address;
use App\Models\Game;
use App\Models\Province;
use App\Models\Via;
use App\Models\File;
use Duplex\Enums\GameState;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Duplex\Enums\FileType;
use Inertia\Response;

class MoreInfoController extends Controller
{
    public function show()
    {
        $token = request('token');

        if (!$token || !Game::query()->where('token', $token)->exists()){
            return redirect()->route('home');
        }

        return Inertia::render('Public/Game/WinnerInfo', [
            'site_key' => config('duplex.recaptcha.public'),
            'lang' => config('duplex.recaptcha.lang'),
            'provinces' => Province::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
            'vias' => Via::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(StoreGameWinnerRequest $request)
    {
        $game = Game::query()->where('token', $request->token)->firstOrFail();

        File::query()->create([
            'user_id' => $game->user_id,
            'game_id' => $game->id,
            'type' => FileType::FrontDni,
            'hash' => $request->file,
        ]);

        Address::query()->create([
            'user_id' => $game->user_id,
            'type' => 'prize', // 'game', 'prize'
            'via_id' => $request->via,
            'address' => $request->address,
            'number' => $request->number,
            'stair' => $request->stair,
            'floor' => $request->floor,
            'door' => $request->door,
            'postal_code' => $request->zipNumber,
            'phone' => $request->phone,
            'city' => $request->city,
            'province_id' => $request->province,
            'game_id' => $game->id,
        ]);

        $game->update([
            'state' => GameState::Awaiting,
            'token' => Str::random(32),
        ]);

        return redirect()->route('game-result.thanks');
    }

    public function thanks(): Response
    {
        return Inertia::render('Public/Game/Thanks');
    }
}
