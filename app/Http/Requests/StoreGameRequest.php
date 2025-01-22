<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreGameRequest extends FormRequest
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
            //Personal
            'nombre' => 'required|string',
            'first_surname' => 'required|string',
            'email' => 'required|email:dns',

            // Ticket
            'buydate' => 'required|date',
            'file' => ['required', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],

            // Legal
            'adult' => 'required|accepted',
            'legal' => 'required|accepted',
            'recaptcha' => new GoogleRecaptcha(),
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
