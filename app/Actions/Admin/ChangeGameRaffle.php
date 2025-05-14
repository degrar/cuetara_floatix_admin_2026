<?php

namespace App\Actions\Admin;


use App\Mail\MoreInfo;
use App\Mail\Raffle;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ChangeGameRaffle
{
    public function __invoke(Game $game)
    {
        Log::channel('raffle')->info('Inicio de __invoke', [
            'game_id' => $game->id,
            'estado_actual' => $game->raffle,
        ]);

        if ($game->raffle) {
            Log::channel('raffle')->warning('El juego ya estaba en el sorteo', [
                'game_id' => $game->id
            ]);
            return response('Game is already in the raffle', 400);
        }

        $game->update([
            'raffle' => 1,
            'date_email' => now(),
        ]);

        Log::channel('raffle')->info('Juego marcado para sorteo', [
            'game_id' => $game->id,
            'fecha' => now()->toDateTimeString(),
        ]);

        $this->sendRaffleMail($game);

        Log::channel('raffle')->info('Correo de sorteo enviado', [
            'game_id' => $game->id,
        ]);

        return response(null, 200);
    }


    private function sendRaffleMail(Game $game): void
    {
        Mail::to([['name' => $game->user->name, 'email' => $game->user->email]])->send(new Raffle($game->token));
    }
}
