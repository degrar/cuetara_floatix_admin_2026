<?php

namespace App\Jobs;

use App\Mail\Contact;
use App\Mail\Lost;
use App\Mail\MoreInfo;
use App\Mail\UserLost;
use App\Mail\UserWon;
use App\Models\Game;
use App\Models\User;
use Duplex\Enums\GameState;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendMail
{
    use Dispatchable;

    private User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private readonly Game $game,
        private readonly ?int $type = null
    ) {
        $this->user = $game->user;
     }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        switch($this->game->state)
        {
            case GameState::Awaiting:
                $this->sendAwaitingMail();
                break;

            case GameState::Loser:
                $this->sendLoserMail();
                break;
        }
    }

    private function sendAwaitingMail(): void
    {
        Mail::to([['email' => $this->user->email, 'name' => $this->user->name]])
            ->send(new MoreInfo($this->game->token, $this->type));
    }

    private function sendLoserMail(): void
    {
        Mail::to([['email' => $this->user->email, 'name' => $this->user->name]])
            ->send(new Lost($this->game->decline_reason));
    }

    private function sendUserHasReplied(): void
    {
        $message = sprintf(
            'El usuario %s#%d (%s) ha subido los archivos solicitados. Gracias.',
            join(' ', [$this->game->user->name, $this->game->user->surname]),
            $this->game->user->id,
            $this->game->user->email
        );

        Mail::to([[
            'email' => config('mail.from.address'),
            'name' => config('mail.from.name')
        ]])
            ->send(new Contact($this->game->user->name, $this->game->user->email, $message, true));
    }
}
