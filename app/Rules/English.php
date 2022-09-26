<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class English implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[A-Za-z\s]*$/', $value);
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return __("backend.english_only");
    }
}
