<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Address;
use App\Models\Province;
use App\Models\User;

use Duplex\Game\GameMechanism;
use Duplex\Enums\{GameResult, Role, Game as GameType};

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use \Inertia\Response;

class GameController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Public/Game', [
            'site_key' => config('duplex.recaptcha.public'),
            'lang' => config('duplex.recaptcha.lang'),
        ]);
    }

    public function store(StoreGameRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->getEmail())->get()->first();

        if (!$user) $user = $this->createUser($request);

        $gameSystem = new GameMechanism(
            type: GameType::Mmgg,
            user: $user,
            request: $request
        );

        $result = $gameSystem->play();

        return match ($result) {
            GameResult::Winner => Redirect::route('game-result.winner'),
            GameResult::Won => Redirect::route('game-result.lost'),
            GameResult::Lost => Redirect::route('game-result.lost'),
            GameResult::MaxDay => Redirect::route('game-result.max')
        };
    }

    private function createUser(StoreGameRequest $request): User
    {

        $user = User::query()
            ->create([
                'name' => $request->nombre,
                'first_surname' => $request->first_surname,
                'second_surname' => $request->second_surname ?? '',
                'email' => $request->email,
                'phone' => $request->phone,
                'legal' => true,
                'adult' => true,
                'ads' => $request->ads ?? false,
                'role' => Role::User->value,
            ]);

//        Address::query()
//            ->create([
//                'province_id' => 0,
//                'user_id' => $user->id,
//            ]);

        return $user;
    }
}
