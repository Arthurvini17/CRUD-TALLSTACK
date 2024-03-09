<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaiorDeIdade implements ValidationRule
{



public function passes($attribute, $value){
    $birthdate = Carbon::parse($value);
    $age = $birthdate->age;

    return $age >=18;


}

public function message(){
    return 'Voce deve ter pelo menos 18 anos';
}


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
