<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameWinnerRequest;
use App\Models\Address;
use App\Models\Game;
use App\Models\Province;
use App\Models\Stock;
use App\Models\StreamigsPlatforms;
use App\Models\Via;
use App\Models\File;
use Duplex\Enums\GameState;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Duplex\Enums\FileType;
use Inertia\Response;

class MoreInfoController extends Controller
{
    public function show(string $token)
    {
        if (!Game::query()->where('token', $token)->first())
            return redirect()->route('home');

        $view = Game::query()->where('token', $token)->first()->prize_id === 1 ? 'MoreInfoSwitch' : 'MoreInfoCard';
        return Inertia::render('Public/Game/'.$view, [
            'token' => $token,
            'platforms' => StreamigsPlatforms::query()->where('show', 1)->orderBy('name')->get(['id', 'name']),
            'prize' => Game::query()->where('token', $token)->first()->prize_id,
            'type' => request('type', 0),
            'site_key' => config('duplex.recaptcha.public'),
            'provinces' => Province::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
            'vias' => Via::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
            'lang' => config('duplex.recaptcha.lang'),
        ]);
    }

    public function store(StoreGameWinnerRequest $request)
    {

        $type = (int) request('type');

        $game = Game::query()->where('token', $request->token)->firstOrFail();
        $prize = Game::query()->where('token', $request->token)->first()->prize_id;



        if ($type === 0 && $prize === 1) {
            Address::query()->create([
                'user_id' => $game->user_id,
                'type' => 'prize',
                'via_id' => $request->via,
                'name' => $request->name,
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
        }

        if ( $prize === 1 && ($type === 0 || $type === 3 || $type === 4)) {
            $hashDniFront = request()->file('front')->store('files');
            File::query()->create([
                'user_id' => $game->user_id,
                'game_id' => $game->id,
                'type' => FileType::FrontDni,
                'hash' => $hashDniFront,
            ]);

            $hashDniBack = request()->file('back')->store('files');
            File::query()->create([
                'user_id' => $game->user_id,
                'game_id' => $game->id,
                'type' => FileType::BackDni,
                'hash' => $hashDniBack,
            ]);
        }

        if  ($prize === 1 && ($type === 0 || $type === 2))
        {
            $hashLetter = request()->file('letter')->store('files');
            File::query()->create([
                'user_id' => $game->user_id,
                'game_id' => $game->id,
                'type' => FileType::Acceptance,
                'hash' => $hashLetter,
            ]);
        }

        $updateData = [
            'state' => GameState::Awaiting,
            'token' => Str::random(32),
        ];

        if ($prize == 2 && $type === 0) $updateData['platform_id'] = $request->platforms;

        $game->update($updateData);

        return redirect()->route('thanks');
    }

    public function thanks(): Response
    {
        return Inertia::render('Public/Game/Thanks');
    }
}
