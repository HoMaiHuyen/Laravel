<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        var_dump($$attribute);
        die($attribute);
        if ($value === strtoupper($value)) {
            return true;
        }
        return false;
    }

    public function message(){
        return ':attribute invalid';
    }
}
