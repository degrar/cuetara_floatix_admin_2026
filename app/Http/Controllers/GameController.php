<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Mail\MoreInfo;
use App\Mail\Winner;
use App\Models\Address;
use App\Models\Province;
use App\Models\Retailer;
use App\Models\User;

use Duplex\Game\GameMechanism;
use Duplex\Enums\{Game, GameResult, Role, Game as GameType};

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use \Inertia\Response;

class GameController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Public/Game',[
            'retailers' => Retailer::query()->where('show', 1)->where('country', config('duplex.recaptcha.lang'))->orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(StoreGameRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->getEmail())->get()->first();

        if (!$user) $user = $this->createUser($request);
        else{
            $user->update([
                'ads' => $request->ads ?? false,
            ]);
        }

        $gameSystem = new GameMechanism(
            type: GameType::Mmgg,
            user: $user,
            request: $request
        );

        $result = $gameSystem->play();

        if ($result['game'] === GameResult::Winner)
        {
            $this->sendWinnerMail($gameSystem->getGame());
        }

        return match ($result['game']) {
            GameResult::Winner => Redirect::route('more-info', ['token' => $gameSystem->getGame()->token]),
            GameResult::WinnerPending => Redirect::route('game-result.winner'),
            GameResult::Won, GameResult::Lost => Redirect::route('game-result.lost'),
            GameResult::MaxDay, GameResult::MaxMonth => Redirect::route('game-result.max')
        };
    }

    private function createUser(StoreGameRequest $request): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
    {

        $user = User::query()
            ->create([
                'name' => $request->nombre,
                'first_surname' => $request->first_surname,
                'second_surname' => $request->second_surname ?? '',
                'email' => $request->email,
                'legal' => true,
                'adult' => true,
                'ads' => $request->ads ?? false,
                'role' => Role::User->value,
            ]);

        return $user;
    }

    private function sendWinnerMail(\App\Models\Game $game)
    {
        dispatch(function () use ($game) {
            \Mail::to([['name' => $game->user->name, 'email' => $game->user->email]])->send(new Winner($game->token, '0', $game->prize_id));
        })->afterResponse();
    }


}
