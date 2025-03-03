<?php

namespace Duplex\Game;

use App\Http\Requests\StoreGameRequest;
use App\Models\Code;
use App\Models\File;
use App\Models\Game as GameModel;
use App\Models\GameLog;
use App\Models\Mmgg;
use App\Models\User;
use Carbon\Carbon;
use Duplex\Enums\{FileType, Game, GameResult, Game as GameType, GameState};
use Illuminate\Support\Facades\Session;
use Str;

class GameMechanism
{
    private const DefaultStorageFolder = 'tickets';
    private int $maxDailyAttemps = 1;
    private int $maxMonthlyAttemps = 5;
    private int $maxAttemps = 30;
    private GameModel $game;

    public function __construct(
        private readonly GameType         $type,
        private readonly User             $user,
        private readonly StoreGameRequest $request
    )
    {
        $this->maxDailyAttemps = config('duplex.promo.attemps.day');
        $this->maxMonthlyAttemps = config('duplex.promo.attemps.day');
        $this->maxAttemps = config('duplex.promo.attemps.total');
    }

    public function play(): array
    {

        $this->createGameLog();

        $maxAttemps = $this->hasReachedMaxAttemps();

        if ($maxAttemps !== null) return $maxAttemps;

        $attempts = GameModel::getTotalPlaysForUser($this->user->id);

        $game = $this->createGame($attempts->total);

        if (GameType::Mmgg === $this->type)
        {
            $mmggAvailable = Mmgg::firstAvailable();

            if ($mmggAvailable !== null)
            {
//                dd($mmggAvailable,  $mmggAvailable->prize_id);
                $mmggAvailable->assign($this->user->id, $game->id);
                Session::flash('winner');
                Session::flash('prize', $mmggAvailable->prize_id);
                Session::flash('token', $game->token);
                $this->game->update([
                    'state' => GameState::Requested,
                    'prize_id' => $mmggAvailable->prize_id
                ]);
                return  [
                    'game' => GameResult::Winner,
                    'prize' => $mmggAvailable->prize_id,
                    'token' => $game->token,
                    ];
            }
            else {
                return  [
                    'game' => GameResult::Lost
                ];

            }
        }

        return  [
            'game' => GameResult::Won
        ];

    }

    public function getGame(): ?GameModel
    {
        return $this->game;
    }

    private function createGame(): GameModel
    {
        $gameAttrs = [
            'user_id' => $this->user->id,
            'token' => Str::random(32),
            'state' => GameState::Loser,
            'buydate' => $this->request->buydate,
        ];

        if ($this->type === GameType::Mmgg)
        {
            $gameAttrs = [
                ...$gameAttrs,
                ...$this->getMmggAttrs()
            ];
        } else if($this->type === GameType::Comment) {
            $gameAttrs = [
                ...$gameAttrs,
                ...$this->getCommentAttrs()
            ];
        }

        $this->game = GameModel::query()->create($gameAttrs);

        $this->storeFile($this->game->id);

        return $this->game;
    }

    private function createGameLog(): void
    {
        GameLog::create([
            'user_id' => $this->user->id,
            'request' => json_encode($this->request->validationData())
        ]);
    }

    private function hasReachedMaxAttemps(): ?array
    {
        // Ha guanyat una vegada ya?
        if (Mmgg::getTotalForUser($this->user->id) > 0)
            return  [
                'game' => GameResult::Lost
            ];

        $attempts = GameModel::getTotalPlaysForUser($this->user->id);

        if ($attempts->month >= $this->maxMonthlyAttemps)
            return  [
                'game' => GameResult::MaxDay
            ];
        return null;
    }

    private function storeFile(int $gameId): void
    {
        $hash = $this->request->file('file')->store(self::DefaultStorageFolder);
        File::query()->create([
            'hash' => $hash,
            'user_id' => $this->user->id,
            'game_id' => $gameId,
            'is_valid' => 0,
            'type' => FileType::Ticket
        ]);
    }

    private function getCommentAttrs(): array
    {
        return [
            'comment' => $this->request->comment
        ];
    }

    private function getMmggAttrs(): array
    {
        return [

        ];
    }
}
