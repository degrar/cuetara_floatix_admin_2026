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
            'prize' => 'required|in:1,2', //1 = switch, 2 = platform

            'via' => 'required_if:prize,1|nullable|exists:App\Models\Via,id',
            'name' => 'required_if:prize,1|nullable|string',
            'number' => 'required_if:prize,1|nullable|string',
            'zipNumber' => ['required_if:prize,1', 'nullable', 'regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/'],
            'city' => 'required_if:prize,1|nullable|string',
            'province' => 'required_if:prize,1|nullable|exists:App\Models\Province,id',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable|string',
            'phone' => 'required_if:prize,1|nullable|regex:/^[0-9]{9}$/',

            'platforms' => 'required_if:prize,2|nullable|exists:App\Models\StreamigsPlatforms,id',

            'front' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],
            'back' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],
            'letter' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],

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
