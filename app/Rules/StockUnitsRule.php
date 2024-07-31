<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Stock;

class StockUnitsRule implements ValidationRule
{
    public function validate($attribute, $value, Closure $fail): void
    {
        $stock = Stock::find($value);
        if ($stock && $stock->used == $stock->units) {
            $fail('Talla no disponible.');
        }
    }
}
