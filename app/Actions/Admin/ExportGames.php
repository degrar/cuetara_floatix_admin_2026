<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Models\Game;
use Carbon\Carbon;
use Duplex\Enums\GameState;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportGames
{
    public function __invoke()
    {
        $filename = sprintf('%s_%s_participaciones.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            Game::with(['user', 'files', 'mmgg'])
                ->get()
                ->map([self::class, 'transform'])
                ->toArray()
        );

        $excel->toBrowser();
    }

    public static function transform(Game $game): array
    {
        $file = $game->files->first();
        return [
            'id' => $game->id,
            'fecha' => Carbon::parse($game->created_at)->format('Y-m-d H:i:s'),
            'estado' => trans('gamestate.' . $game->state->name),
            'momento_ganador' => $game->mmgg?->date_moment,

            // user
            'id_usuario' => $game->user->id,
            'nombre' => $game->user->name,
            'apellidos' => $game->user->surname,
            'email' => $game->user->email,
            'phone' => $game->user->phone,
            'anuncios' => $game->user->ads ? 'Sí' : 'No',

            'imagen' => route(str_ends_with($file->hash, '.pdf') ? 'admin.files.pdf' : 'admin.files.image', $file?->id),
        ];
    }
}
