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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:0,2,3,4', // 0: Documentación + IBAN, 2: CARTA, 3: DNI, 4: DNI Y CARTA (SIN DIRECCIÓN)
            'iban' => ['required', 'string', $this->validateIban(), 'regex:/^ES\d{2}(\s*\d{4}){5}$/', new ValidIban()],
            'front' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],
            'back' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],

            // Legal
            'privacy' => 'required|accepted',

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
}
