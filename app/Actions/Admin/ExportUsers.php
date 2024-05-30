<?php

namespace App\Actions\Admin;


use App\Models\User;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportUsers
{
    public function __invoke()
    {
        $filename = sprintf('%s_%s_usuarios.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            User::get()
                ->map([self::class, 'transform'])
                ->toArray()
        );

        $excel->toBrowser();
    }

    public static function transform(User $user): array
    {
       

        return [
            'id' => $user->id,
            'nombre' => $user->name,
            'apellido' => $user->surname,
            'email' => $user->email,
            'fechaNacimiento' => $user->birthdate,
            'telefono' => $user->phone,
            'legal' => $user->legal ? 'Sí' : 'No',
            'anuncios' => $user->ads ? 'Sí' : 'No',
            'BBDD' => $user->bbdd ? 'Sí' : 'No',
            'fechaCreacion' => $user->created_at,

        ];
    }
}
