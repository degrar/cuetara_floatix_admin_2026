<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Stock;

class UniqueStockSize implements ValidationRule
{
    protected $stock1;

    /**
     * Crea una nueva instancia de la regla.
     *
     * @param int|null $stock1
     * @return void
     */
    public function __construct( int $stock1 = null)
    {
        $this->stock1 = $stock1;
    }

    /**
     * Determina si la regla de validación se pasa.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate($attribute, $value, Closure $fail): void
    {
        $stock1 = Stock::find($this->stock1);
        $stock2 = Stock::find($value);

        if ($stock1 && $stock2) {
            if ($stock1->id === $stock2->id && ($stock1->units - $stock1->used) <= 1) {
                $fail('Sólo nos queda una talla.');
            }
        }
    }
}
