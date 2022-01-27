<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckDayWork implements Rule
{
    public $minute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minute)
    {
        $this->minute = $minute;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = Carbon::parse($value);
        $day = $value->format('l');
        if ($day == 'Monday') {
            if ($this->minute->isAvailableOnMonday == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Tuesday') {
            if ($this->minute->isAvailableOnTuesday == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Wednesday') {
            if ($this->minute->isAvailableOnWednesday == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Thursday') {
            if ($this->minute->isAvailableOnThursday == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Friday') {
            if ($this->minute->isAvailableOnFriday  == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Saturday') {
            if ($this->minute->isAvailableOnSaturday == 0) {
                return false;
            } else {
                return true;
            }
        } else if ($day == 'Sunday') {
            if ($this->minute->isAvailableOnSunday == 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Le docteur n'est pas disponible";
    }
}
