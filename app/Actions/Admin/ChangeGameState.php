<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Mail\Confirmed;
use App\Models\Game;
use Duplex\Enums\GameState;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ChangeGameState
{
    private const MIN_DECLINE_REASON_LENGTH = 3;
    private const ACTIONS = [
        'awaiting',
        'winner',
        'loser',
    ];

    public function __invoke(Game $game, string $action)
    {
        if (!in_array($action, self::ACTIONS))
            return response()->setStatusCode(403);

		$futureState = GameState::fromString($action);

        request()->validate([
            'code' => 'required_if:action,=,winner',
            'message' => 'required_if:action,=,loser|min:' . self::MIN_DECLINE_REASON_LENGTH,
            'type' => 'required_if:action,=,awaiting|integer|in:1,2'
        ]);

        if ($futureState === GameState::Loser)
            $game->decline_reason = (string) request('message');

        $game->update([
            'state' => $futureState
        ]);

        $type = $futureState === GameState::Awaiting ? ((int) request('type')) : null;

        if ($futureState === GameState::Winner)
            $this->sendConfirmedMail($game);
        else
            SendMail::dispatchAfterResponse($game, $type);

        return response(null, 200);
    }

    private function sendConfirmedMail(Game $game): void
    {
        Mail::to([['email' => $game->user->email, 'name' => $game->user->name]])
            ->send(new Confirmed(request('code')));
    }
}
