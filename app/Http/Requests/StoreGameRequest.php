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
            'email_repeat' => 'required|email:dns|same:email',
            'phone' => 'required|regex:/^[0-9]{9}$/', // 9 digits
            'option' => 'required|numeric|in:1,2',

            // OPTION 1 - Código
            'code' => ['required_if:option,1', 'nullable', 'string', 'exists:App\Models\Code,code,status,0'],

            // OPTION 2 - Ticket
            'file' => ['required_if:option,2', 'nullable', File::types(['jpeg', 'jpg', 'pdf', 'png'])->max(8 * 1024)],
            'buydate' => 'required_if:option,2|nullable|date',
            'amount' => 'required_if:option,2|nullable|regex:/^\d+(\,\d{1,2})?$/',

            // Legal
            'adult' => 'required|accepted',
            'legal' => 'required|accepted',
            'privacy' => 'required|accepted',
            'recaptcha' => new GoogleRecaptcha(),
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
