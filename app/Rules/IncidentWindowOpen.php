<?php

namespace App\Rules;

use App\Models\Race;
use Illuminate\Contracts\Validation\InvokableRule;

class IncidentWindowOpen implements InvokableRule
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
        $race = Race::find($value);
        if ($race->date > now()) {
            $fail('Race date is in the future');
        } elseif ($race->date < now()->subDay(2)) {
            $fail('The incident-filing window has lapsed');
        }
    }
}
