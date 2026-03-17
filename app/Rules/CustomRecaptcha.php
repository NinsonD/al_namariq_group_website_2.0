<?php

namespace App\Rules;

use Closure;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Validation\ValidationRule;

class CustomRecaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $settings = Cache::get('setting');

        $recaptcha = new ReCaptcha($settings->recaptcha_secret_key);
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        if (! $response->isSuccess()) {
            $notify_message = __('rules.recaptcha');
            $fail($notify_message);
        }
    }
}
