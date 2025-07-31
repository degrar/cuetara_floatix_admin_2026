<?php

    namespace App\Actions\Admin;

    use App\Mail\Reclaim;
    use App\Models\User;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Storage;

    class ImportReclaim
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
                if (empty($csvData) || !isset($csvData[0]) || $csvData[0][0] !== 'email') {
                    return response()->json(['error' => 'Formato de archivo CSV no válido, debe tener el mismo formato que el ejemplo.'], 403);
                }else {
                    unset($csvData[0]); // Quitar cabecera: "email"
                    foreach ($csvData as $row) {
                        $this->processUserReclaim((string) $row[0]);
                    }

                    return response()->json(['message' => 'Correos enviados correctamente.'], 200);
                }
            }

            return response()->json(['error' => 'Archivo no válido o no proporcionado.'], 403);
        }

        private function processUserReclaim(string $email): void
        {
            $user = User::where('email', $email)->first();

            if (!$user) {
                Log::channel('reclaim')->warning('Usuario no encontrado', ['email' => $email]);
                return;
            }

            Log::channel('reclaim')->info('Procesando', [
                'email' => $email,
                'id_usuario' => $user->id,
            ]);

            try {
                $this->sendReclaimMail($user);

                Log::channel('reclaim')->info('Correo enviado', [
                    'email' => $email,
                    'fecha' => now()->toDateTimeString(),
                ]);
            } catch (\Exception $e) {
                Log::channel('reclaim')->error('Error al enviar correo', [
                    'email' => $email,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        private function sendReclaimMail(User $user): void
        {
            Mail::to([['name' => $user->name, 'email' => $user->email]])->send(new Reclaim());
        }
    }
