<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Models\Claim;
use App\Models\Game;
use Carbon\Carbon;
use Duplex\Enums\GameState;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportClaim
{
    public function __invoke()
    {

//        var_dump('<pre>');
//        var_dump(Claim::with(['user' => function  ($query) {
//                return $query->where('role', '=', 'user');
//            }, 'address', 'address.via:id,name', 'address.province:id,name'])
//                ->get()
//                ->map([self::class, 'transform'])
//                ->toArray());
//        var_dump('</pre>');
//        die();

        $filename = sprintf('%s_%s_floatix.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            Claim::with(['user' => function  ($query) {
                return $query->where('role', '=', 'user');
            }, 'address', 'address.via:id,name', 'address.province:id,name'])
                ->get()
                ->map([self::class, 'transform'])
                ->toArray()

        );

        $excel->toBrowser();
    }

    public static function transform(Claim $game): array
    {

        $address = $game->address->first();
//
//        foreach ($game->files as $key => $file) {
//            $images[]  = route(str_ends_with($file->hash, '.pdf') ? 'admin.files.pdf' : 'admin.files.image', $file->id);
//        }

        $participation = [

            //user
            'id_usuario' => $game->user->id,
            'nombre' => $game->user->name,
            'apellidos' => $game->user->surname,
            'email' => $game->user->email,
            'anuncios' => $game->user->ads ? 'Sí' : 'No',

            // game
            'id_participacion' => $game->id,
            'modelo' => $game->stock_id === 1 ? 'Tiburón' : 'Tortuga',
            'sorteo' => $game->raffle === 0 ? 'No' : 'Si',
            'fecha_solicitud' => Carbon::parse($game->created_at)->format('d-m-Y H:i:s'),

            // address
            'direccion' => $address?->via->name.' '.$address?->name,
            'numero' => $address?->number,
            'escalera' => $address?->stair,
            'piso' => $address?->floor,
            'puerta' => $address?->door,
            'codigo_postal' => $address?->postal_code,
            'poblacion' => $address?->city,
            'provincia' => $address?->province->name,
            'telefono' => $address?->phone,

        ];

//        foreach ($game->files as $key => $file) {
//            $participation['imagen_'.$key]  = route(str_ends_with($file->hash, '.pdf') ? 'admin.files.pdf' : 'admin.files.image', $file->id);
//        }

        return $participation;
    }
}
