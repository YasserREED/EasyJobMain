<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SafeFilename implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value)) {
            $filename = pathinfo($value, PATHINFO_FILENAME);

            if (!preg_match('/^[a-zA-Z0-9-_\.]+$/', $filename)) {
                $fail("The $attribute filename contains invalid characters.");
            }
        }
    }
}
