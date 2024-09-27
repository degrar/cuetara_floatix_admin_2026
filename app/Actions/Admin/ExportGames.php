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

        $filename = sprintf('%s_%s_participaciones.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            Game::with(['user' => function  ($query) {
                return $query->where('role', '=', 'user');
            }, 'address', 'address.via:id,name', 'address.province:id,name', 'sizeOneStock:id,name', 'sizeTwoStock:id,name'])
                //->join('users', 'games.user_id', '=', 'users.id')
                //->where('user.role', '=', 'user')
//                ->where('games.id', '=', 1)
                ->get()
                ->map([self::class, 'transform'])
                ->toArray()

        );

        $excel->toBrowser();
    }

    public static function transform(Game $game): array
    {

        $address = $game->address->first();

        $participation = [

            //user
            'id_usuario' => $game->user->id,
            'role' => $game->user->role,
            'nombre' => $game->user->name,
            'apellidos' => $game->user->first_surname.' '.$game->user->second_surname,
            'email' => $game->user->email,
            'anuncios' => $game->user->ads ? 'Sí' : 'No',

            // game
            'id_participacion' => $game->id,
            'momento_ganador' => $game->mmgg?->date_moment,
            'option' => $game->option,
            'codigo' => $game->code ?? '-',
            'importe' => $game->amount ?? '-',
            'Fecha de ticket' => $game->buydate ?? '-',

            'fecha_participacion' => Carbon::parse($game->created_at)->format('d-m-Y H:i:s'),
            'estado' => trans('gamestate.' . $game->state->name),
            'fecha_validacion' => Carbon::parse($game->validated_at)->format('d-m-Y H:i:s'),
            'fecha_confirmacion' => Carbon::parse($game->confirmed_at)->format('d-m-Y H:i:s'),

            // address
            'direccion' => $address?->via->name.' '.$address?->name,
            'numero' => $address?->number,
            'escalera' => $address?->strair,
            'puerta' => $address?->door,
            'codigo_postal' => $address?->postal_code,
            'telefono' => $address?->phone,
            'provincia' => $address?->province->name,

            // jersey
            'talla1' => $game->sizeOneStock?->getAttribute('name'),
            'talla2' => $game->sizeTwoStock?->getAttribute('name'),

            // files
            'imagen_0' => '',

        ];

        foreach ($game->files as $key => $file) {
            $participation['imagen_'.$key]  = route(str_ends_with($file->hash, '.pdf') ? 'admin.files.pdf' : 'admin.files.image', $file->id);
        }

        return $participation;
    }
}
