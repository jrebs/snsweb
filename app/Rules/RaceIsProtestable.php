<?php

namespace App\Rules;

use App\Models\Race;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Log;

class RaceIsProtestable implements InvokableRule
{
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
        if (!Race::protestable()->pluck('id')->contains($value)) {
            $fail('Race no longer eligible for incident reviews');
        }
    }
}
