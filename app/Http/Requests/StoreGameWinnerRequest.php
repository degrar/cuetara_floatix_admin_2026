<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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
            'file' => ['required', File::types(['jpg', 'jpeg', 'png', 'pdf'])->max(8 * 1024)],
            'via' => 'required|exists:vias,id',
            'address' => 'required|string',
            'number' => 'required|string',
            'zipNumber' => ['required', 'regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/'], // Pete si te un pipe el regex, ha de ser un array
            'city' => 'required|string',
            'province' => 'required|exists:provinces,id',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable|string',
            'phone' => 'required|regex:/^[0-9]{9}$/',

            'token' => ['required', 'string', 'exists:\App\Models\Game,token'],

            'recaptcha' => new GoogleRecaptcha(),
        ];
    }
}
