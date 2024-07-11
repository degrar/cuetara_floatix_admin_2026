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

            'via' => 'exclude_if:type,3|required|exists:vias,id',
            'address' => 'exclude_if:type,3|required|string',
            'number' => 'exclude_if:type,3|required|string',
            'zipNumber' => ['exclude_if:type,3', 'required', 'regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/'],
            'city' => 'exclude_if:type,3|required|string',
            'province' => 'exclude_if:type,3|required|exists:provinces,id',
            'stair' => 'exclude_if:type,3|nullable|string',
            'floor' => 'exclude_if:type,3|nullable|string',
            'door' => 'exclude_if:type,3|nullable|string',
            'phone' => 'exclude_if:type,3|required|regex:/^[0-9]{9}$/',

            'token' => ['required', 'string', 'exists:\App\Models\Game,token'],

            'recaptcha' => new GoogleRecaptcha(),
        ];
    }
}
