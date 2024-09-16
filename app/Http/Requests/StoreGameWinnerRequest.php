<?php

namespace App\Http\Requests;

use App\Rules\GoogleRecaptcha;
use App\Rules\StockUnitsRule;
use App\Rules\UniqueStockSize;
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
        // Accede al valor de stock1
        $stock1 = $this->input('stock1');
        return [

            'stock1' => [ 'required', 'string', 'exists:App\Models\Stock,id', new StockUnitsRule],
            'stock2' => [ 'required', 'string', 'exists:App\Models\Stock,id', new StockUnitsRule, new UniqueStockSize($stock1) ],

            'via' => 'required|exists:App\Models\Via,id',
            'name' => 'required|string',
            'number' => 'required|string',
            'zipNumber' => ['required', 'regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/'],
            'city' => 'required|string',
            'province' => 'required|exists:App\Models\Province,id',
            'stair' => 'nullable|string',
            'floor' => 'nullable|string',
            'door' => 'nullable|string',
            'phone' => 'required|regex:/^[0-9]{9}$/',

            'recaptcha' => new GoogleRecaptcha(),
        ];
    }
}
