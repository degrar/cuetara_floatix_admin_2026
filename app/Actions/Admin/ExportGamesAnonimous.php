<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Models\Game;
use Carbon\Carbon;
use Duplex\Enums\GameState;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportGamesAnonimous
{
    public function __invoke()
    {

//        var_dump('<pre>');
//        var_dump(Game::with(['user' => function  ($query) {
//            return $query->where('role', '=', 'user');
//        }, 'address', 'address.via:id,name', 'address.province:id,name', 'sizeOneStock:id,name', 'sizeTwoStock:id,name'])
//                //->join('users', 'games.user_id', '=', 'users.id')
//                //->where('user.role', '=', 'user')
//                ->where('games.id', '=', 1)
//                ->get()
//                ->toArray());
//        var_dump('</pre>');
//        die();

        $filename = sprintf('%s_%s_participaciones_anonima.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            Game::with(['user' => function  ($query) {
                return $query->where('role', '=', 'user');
            }])
                ->get()
                ->map([self::class, 'transform'])
                ->toArray()

        );

        $excel->toBrowser();
    }

    public static function transform(Game $game): array
    {
        $participation = [

            //user
            'id_usuario' => $game->user->id,
            'anuncios' => $game->user->ads ? 'Sí' : 'No',

            // game
            'id_participacion' => $game->id,
            'code' => $game->code,
            'fecha_participacion' => Carbon::parse($game->created_at)->format('d-m-Y H:i:s'),
        ];

        return $participation;
    }
}
