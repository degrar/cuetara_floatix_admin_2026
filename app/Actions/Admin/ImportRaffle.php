<?php

    namespace App\Actions\Admin;

    use App\Mail\Raffle;
    use App\Models\Game;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Storage;

    class ImportRaffle
    {
        public function __invoke(): \Illuminate\Http\JsonResponse
        {
            request()->validate([
                'file' => 'required|mimes:csv,txt',
            ]);

            if (request()->hasFile('file')) {
                $file = request()->file('file')->store('csv');
                $filePath = Storage::path($file);

                $csvData = array_map('str_getcsv', file($filePath));
                unset($csvData[0]); // Quitar cabecera: "id_participacion"

                foreach ($csvData as $row) {
                    $this->processGameRaffle((int) $row[0]);
                }

                return response()->json(['message' => 'Importación de sorteos completada.'], 200);
            }

            return response()->json(['error' => 'Archivo no válido o no proporcionado.'], 403);
        }

        private function processGameRaffle(int $gameId): void
        {
            $game = Game::find($gameId);

            if (!$game) {
                Log::channel('raffle')->warning('Juego no encontrado', ['game_id' => $gameId]);
                return;
            }

            Log::channel('raffle')->info('Procesando juego', [
                'game_id' => $gameId,
                'estado_actual' => $game->raffle,
                'id_usuario' => $game->user_id,
            ]);

            if ($game->raffle) {
                Log::channel('raffle')->warning('Juego ya estaba en el sorteo', [
                    'game_id' => $gameId,
                ]);
                return;
            }

            $game->update([
                'raffle' => 1,
                'date_email' => now(),
            ]);

            Log::channel('raffle')->info('Juego actualizado para sorteo', [
                'game_id' => $gameId,
                'fecha' => now()->toDateTimeString(),
            ]);

            try {
                $this->sendRaffleMail($game);

                Log::channel('raffle')->info('Correo enviado al usuario', [
                    'game_id' => $gameId,
                    'email' => $game->user->email,
                ]);
            } catch (\Exception $e) {
                Log::channel('raffle')->error('Error al enviar correo', [
                    'game_id' => $gameId,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        private function sendRaffleMail(Game $game): void
        {
            Mail::to([['name' => $game->user->name, 'email' => $game->user->email]])->send(new Raffle($game->token));
        }
    }
