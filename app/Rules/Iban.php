<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Iban implements InvokableRule
{
    /**
     * Indicates whether the rule should be implicit.
     */
    public bool $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $iban = new \Iban\Validation\Iban($value);
        $validator = new \Iban\Validation\Validator();

        if (!$validator->validate($iban))
        {
            $fail('errors.iban')->translate();
        }
    }
}
