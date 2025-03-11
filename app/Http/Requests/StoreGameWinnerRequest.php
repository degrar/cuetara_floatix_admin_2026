<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptcha;
use App\Rules\Iban;use App\Rules\StockUnitsRule;
use App\Rules\UniqueStockSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Nembie\IbanRule\ValidIban;

class StoreGameWinnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     */
    public function rules(): array
    {
        return [
            // IF PRIZE = 1 y TYPE = 0 (Solo si el premio es un Switch y el tipo es Documentación)
            'via' => [$this->validatePrize(), 'nullable', 'exists:App\Models\Via,id'],
            'name' => [$this->validatePrize(), 'nullable', 'string'],
            'number' => [$this->validatePrize(), 'nullable', 'string'],
            'zipNumber' => [$this->validatePrize(), 'nullable', 'regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/'],
            'city' => [$this->validatePrize(), 'nullable', 'string'],
            'province' => [$this->validatePrize(), 'nullable', 'exists:App\Models\Province,id'],
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable|string',
            'phone' => [$this->validatePrize(), 'nullable', 'regex:/^[0-9]{9}$/'],

            // IF PRIZE = 1 y TYPE = 0 o 2 (Se necesita carta si type es 0 o 2)
            'letter' => $this->validateLetter(), // el type debe ser un or

            // IF PRIZE = 2 (Plataformas solo para prize = 2)
            'platforms' => ['required_if:prize,2', 'nullable', 'exists:App\Models\StreamigsPlatforms,id'],

            // Archivos requeridos según PRIZE y TYPE
            'front' => ['required_if:type,0,3',File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],
            'back' => ['required_if:type,0,3',File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],

            // ALL (Requeridos en todos los casos)
            'type' => 'required|in:0,2,3,4', // 0: Documentación + IBAN, 2: CARTA, 3: DNI, 4: DNI Y CARTA (SIN DIRECCIÓN)
            'prize' => 'required|in:1,2', // 1 = switch, 2 = platform
            'recaptcha' => new GoogleRecaptcha(),
        ];
    }

    protected function validateIban(): \Closure
    {
        return function ($attribute, $value, $fail) {
            $cleanedValue = preg_replace('/\s+/', '', $value);
            if (strlen($cleanedValue) !== 24) {
                $fail('El IBAN debe tener 24 caracteres sin espacios.');
            }
        };
    }

    protected function validatePrize(): \Closure
    {
        return function ($attribute, $value, $fail) {
            $prize = $this->input('prize'); // Usar input() en lugar de request()
            $type = $this->input('type');

            if (($prize == 1 || $prize == 2) && $type == 0) {
                if ($this->has($attribute) && empty($value)) {
                    $fail('Este campo es obligatorio.');
                }
            }
        };
    }

    protected function validateLetter(): \Closure
    {
        return function ($attribute, $value, $fail) {
            $prize = $this->input('prize'); // Usar input() en lugar de request()
            $type = $this->input('type');

            if (($type == 0 || $type == 2) && $prize == 1) {
                if ($this->has($attribute) && $this->file('letter') == null) {
                    $fail('Este campo es obligatorio.');
                }
            }
        };
    }

}
