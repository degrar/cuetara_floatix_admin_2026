<?php

namespace App\Actions\Admin;

use App\Jobs\SendMail;
use App\Models\Game;
use Duplex\Enums\GameState;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportGames
{
    public function __invoke()
    {
        $filename = sprintf('%s_%s_participaciones.xlsx', config('app.name'), date('dmY_His'));
        $excel = SimpleExcelWriter::streamDownload($filename);

        $excel->addRows(
            Game::with(['user', 'files', 'Prize'])
                ->get()
                ->map([self::class, 'transform'])
                ->toArray()
        );

        $excel->toBrowser();
    }

    public static function transform(Game $game): array
    {
         // Mapeo de códigos de barras a nombres de productos
        $productNames = [
            '8434165483965' => 'Original 570G',
            '8434165624245' => 'Original 760G+100G',
            '8434165611405' => 'Original 760G',
            '8434165611412' => 'Fibra 760G',
        ];

        // Obtener el nombre del producto basado en el código de barras
        $productName = isset($productNames[$game->barcode]) ? $productNames[$game->barcode] : 'Producto Desconocido';

        /// Añadir rutas de los archivos
        $fileColumns = [];
        foreach ($game->files as $index => $file) {
            // Determinar el tipo de archivo
            $fileType = str_ends_with($file->hash, '.pdf') ? 'pdf' : 'image';
            // Generar la ruta utilizando el ID del archivo
            $route = route('admin.files.' . $fileType, ['id' => $file->id]);
            // Añadir la ruta al array de columnas de archivos
            $fileColumns['archivo' . ($index + 1)] = $route;
        }

        $gameAddress= '';
        if($game->prize){
            $gamePrizeType = $game->prize->type === 0 ? 'Camiseta' : 'Entradas';
            if($game->isComplete()){
                $gameEstado = 'Completado';
                if($game->prize->type === 0 ){
                    $gameAddress =  $game->getAddress();
                }
                
            }else{
                $gameEstado = 'No finalizado';
            }
        }else{
            $gamePrizeType = '';
            $gameEstado = '';
        }
        

        return array_merge([
            'id' => $game->id,
            'fecha' => $game->created_at,
            'tipo' => $game->type === 0 ? 'Galleta Ganadora' : 'Sorteo',

            // user
            'nombre' => $game->user->name,
            'apellido' => $game->user->surname,
            'email' => $game->user->email,
            'fechaNacimiento' => $game->user->birthdate,
            'telefono' => $game->user->phone,
            'legal' => $game->user->legal ? 'Sí' : 'No',
            'anuncios' => $game->user->ads ? 'Sí' : 'No',
            'BBDD' => $game->user->bbdd ? 'Sí' : 'No',

            // game
            'fechaCompra' => $game->buydate,
            'codigoBarras' => $game->barcode,
            'producto' => $productName, 
            'codigo' => $game->code,

            //Premio
            'premioGG' => $gamePrizeType,
            'estadoGG' => $gameEstado,
            'entradasPartido' => $game->prize->e_game ?? '',
            'camisetaClub'  => $game->prize->c_club ?? '',
            'camisetaEquipacion' => $game->prize->c_kit ?? '',
            'camisetaModelo' => $game->prize->c_model ?? '',
            'camisetaTalla' => $game->prize->c_size ?? '',
            'direccion' => $gameAddress
            
            


//            'estado' => trans('admin.game.state.' . GameState::from($game->state)->name),
        ], $fileColumns);
    }
}
