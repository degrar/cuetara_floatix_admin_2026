<?php

    namespace App\Rules;

    use Closure;
    use Illuminate\Contracts\Validation\ValidationRule;
    use Illuminate\Support\Facades\Http;

    class GoogleRecaptcha implements ValidationRule
    {
        private const URL = 'https://www.google.com/recaptcha/api/siteverify';

        public function validate(string $attribute, mixed $value, Closure $fail): void
        {
            if ((bool)config('app.debug'))
                return;

            if (!$this->isValidToken($value))
                $fail('errors.recaptcha')->translate();
        }

        private function isValidToken(string $value): bool
        {
            $resp = Http::asForm()->post(self::URL, [
                'secret' => config('duplex.recaptcha.secret'),
                'response' => $value
            ])->json();

            return $resp['success'];
        }
    }
