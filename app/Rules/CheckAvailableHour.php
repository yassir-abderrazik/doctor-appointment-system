<?php

namespace App\Rules;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckAvailableHour implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start, $minute)
    {
        $this->minute =  $minute;
        $this->start =  $start;
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
        $start = Carbon::parse($this->start)->format('Y-m-d');
        $day = Carbon::parse($this->start)->format('l');
        $last = Appointment::where('start', 'like', $start . '%')->where('doctor_id',  $this->minute->doctor_id)->latest()->value('end');
        if (empty($last)) {
            return true;
        } else {
            $last = Carbon::parse($last)->addMinutes($this->minute->timeConsultation);
            $last = $last->format('H:i');
            if ($day == 'Monday') {
                if ($last <= $this->minute->mondayClosingTime) {
                    return true;
                } else {
                    return false;
                }
            } else if ($day == 'Tuesday') {
                if ($last <= $this->minute->tuesdayClosingTime) {

                    return true;
                } else {
                    // die($day . ' / ' . $last . ' / ' . $this->minute->tuesdayClosingTime);

                    return false;
                }
            } else if ($day == 'Wednesday') {
                if ($last <= $this->minute->wednesdayClosingTime) {
                    return true;
                } else {

                    return false;
                }
            } else if ($day == 'Thursday') {
                if ($last <= $this->minute->thursdayClosingTime) {
                    return true;
                } else {
                    return false;
                }
            } else if ($day == 'Friday') {
                if ($last <= $this->minute->fridayClosingTime) {
                    return true;
                } else {
                    return false;
                }
            } else if ($day == 'Saturday') {
                if ($last <= $this->minute->saturdayClosingTime) {
                    return true;
                } else {
                    return false;
                }
            } else if ($day == 'Sunday') {
                if ($last <= $this->minute->sundayClosingTime) {
                    return true;
                } else {
                    return false;
                }
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
        return '3amr had nhar';
    }
}
