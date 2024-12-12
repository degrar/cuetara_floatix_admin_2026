<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameWinnerRequest;
use App\Models\Address;
use App\Models\Game;
use App\Models\Province;
use App\Models\Stock;
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

        return Inertia::render('Public/Game/WinnerInfo', [
            'token' => $token,
            'type' => request('type', 0),
            'site_key' => config('duplex.recaptcha.public'),
            'lang' => config('duplex.recaptcha.lang'),
        ]);
    }

    public function store(StoreGameWinnerRequest $request)
    {

        $type = (int) request('type');
        $iban = (string) request('iban');

        $game = Game::query()->where('token', $request->token)->firstOrFail();

        if ($type === 0 || $type === 3 || $type === 4)
        {
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

        $game->update([
            'state' => GameState::Awaiting,
            'token' => Str::random(32),
            'iban' => $iban,
        ]);



        return redirect()->route('thanks');
    }

    public function thanks(): Response
    {
        return Inertia::render('Public/Game/Thanks');
    }
}
