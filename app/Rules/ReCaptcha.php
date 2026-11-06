<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Translation\PotentiallyTranslatedString;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('The :attribute field is required.');

            return;
        }

        $secret = config('services.recaptcha.secret_key');

        if (empty($secret)) {
            $fail('reCAPTCHA is not configured for this application.');

            return;
        }

        $response = Http::asForm()->post(config('services.recaptcha.verify_url'), [
            'secret' => $secret,
            'response' => $value,
        ])->json();

        if (! is_array($response) || ! ($response['success'] ?? false)) {
            $fail('Google reCaptcha is not valid');
        }
    }
}
