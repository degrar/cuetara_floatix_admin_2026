<?php

namespace Duplex\Game;

use App\Http\Requests\StoreGameRequest;
use App\Models\File;
use App\Models\Game as GameModel;
use App\Models\GameLog;
use App\Models\Mmgg;
use App\Models\User;
use Duplex\Enums\{Game, GameResult, Game as GameType, GameState};
use Str;

class GameMechanism
{
    private const DefaultStorageFolder = 'tickets';
    private int $maxDailyAttemps = 1;
    private int $maxAttemps = 30;

    public function __construct(
        private readonly GameType         $type,
        private readonly User             $user,
        private readonly StoreGameRequest $request
    )
    {
        $this->maxDailyAttemps = config('duplex.promo.attemps.day');
        $this->maxAttemps = config('duplex.promo.attemps.total');
    }

    public function play(): GameResult
    {

        $this->createGameLog();

        $maxAttemps = $this->hasReachedMaxAttemps();

        if ($maxAttemps !== null)
            return $maxAttemps;

        $game = $this->createGame();


        if (GameType::Mmgg === $this->type)
        {
            $mmggAvailable = Mmgg::firstAvailable();

            if ($mmggAvailable !== null)
            {
                $mmggAvailable->assign($this->user->id, $game->id);

                return GameResult::Winner;
            }
            else {
                return GameResult::Lost;
            }
        }


        return GameResult::Won;
    }

    private function createGame(): GameModel
    {
        $gameAttrs = [
            'user_id' => $this->user->id,
            'token' => Str::random(32),
            'state' => GameState::Pending
        ];

        if ($this->type === GameType::Mmgg)
        {
            $gameAttrs = [
                ...$gameAttrs,
                //$this->getMmggAttrs()
            ];
        } else if($this->type === GameType::Comment) {
            $gameAttrs = [
                ...$gameAttrs,
                $this->getCommentAttrs()
            ];
        }

        $game = GameModel::create($gameAttrs);

        $this->storeFile($game->id);

        return $game;
    }

    private function createGameLog(): void
    {
        GameLog::create([
            'user_id' => $this->user->id,
            'request' => json_encode($this->request->validationData())
        ]);
    }

    private function hasReachedMaxAttemps(): ?GameResult
    {
        // Ha guanyat una vegada ya?
        if (Mmgg::getTotalForUser($this->user->id) > 0)
            return GameResult::Won;

        $attempts = GameModel::getTotalPlaysForUser($this->user->id);

        if (
            $attempts->today >= $this->maxDailyAttemps ||
            $attempts->total >= $this->maxAttemps
        )
            return GameResult::MaxDay;

        return null;
    }

    private function storeFile(int $gameId): void
    {
        $hash = $this->request->file('file')->store(self::DefaultStorageFolder);
        File::query()->create([
            'hash' => $hash,
            'user_id' => $this->user->id,
            'game_id' => $gameId,
            'is_valid' => 0
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
            'amount' => $this->request->total
        ];
    }
}
