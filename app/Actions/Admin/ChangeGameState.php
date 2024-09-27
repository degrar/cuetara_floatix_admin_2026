<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Mail\Confirmed;
use App\Mail\Lost;
use App\Mail\MoreInfo;
use App\Mail\Winner;
use App\Models\Game;
use Carbon\Carbon;
use Duplex\Enums\GameState;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ChangeGameState
{
    private const MIN_DECLINE_REASON_LENGTH = 3;
    private const ACTIONS = [
        'valid',
        'request',
        'winner',
        'denied',
    ];

    public function __invoke(Game $game, string $action)
    {
        if ( !in_array($action, self::ACTIONS) )
            return response()->setStatusCode(403);

        $futureState = GameState::fromString($action);

        request()->validate([
            'message' => 'required_if:action,=,denied|min:' . self::MIN_DECLINE_REASON_LENGTH,
            'type' => 'required_if:action,=,request|integer|in:0,1'
        ]);

        if ( $futureState === GameState::Denied ) {
            $game->decline_reason = (string)request('message');
            $game->update(['validated_at' => Carbon::now()]);
            $this->sendLoserMail($game);
        }

        $game->update([
            'state' => $futureState
        ]);

        $type = $futureState === GameState::Valid ? ( (int)request('type') ) : null;

        if ( $futureState === GameState::Valid ){
            $game->update(['validated_at' => Carbon::now()]);
            $this->sendWinnerMail($game);
        }

        if ( $futureState === GameState::Winner ){
            $game->update(['confirmed_at' => Carbon::now()]);
            $this->sendConfirmedMail($game);
        } else
            SendMail::dispatchAfterResponse($game, $type);

        return response(null, 200);
    }

    private function sendConfirmedMail(Game $game): void
    {
        Mail::to([['email' => $game->user->email, 'name' => $game->user->name]])->send(new Confirmed());
    }

    private function sendWinnerMail(Game $game)
    {
        Mail::to([['name' => $game->user->name, 'email' => $game->user->email]])->send(new MoreInfo($game->token, '0'));
    }

    private function sendLoserMail(Game $game): void
    {
        Mail::to([['email' => $game->user->email, 'name' => $game->user->name]])->send(new Lost($game->decline_reason));
    }

}
