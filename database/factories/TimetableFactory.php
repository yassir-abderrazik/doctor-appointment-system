<?php

namespace Database\Factories;

use App\Models\Timetable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimetableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timetable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'doctor_id' => User::where('type', 'doctor')->inRandomOrder()->first()->id,
            'isAvailableOnMonday' => 1,
            'mondayStartingTime' => "08:00",
            'mondayClosingTime'  => "16:00",

            'isAvailableOnTuesday'  => 1,
            'tuesdayStartingTime'  => "08:00",
            'tuesdayClosingTime'  => "16:00",

            'isAvailableOnWednesday'  => 1,
            'wednesdayStartingTime'  => "08:00",
            'wednesdayClosingTime'  => "16:00",

            'isAvailableOnThursday'  => 1,
            'thursdayStartingTime'  => "08:00",
            'thursdayClosingTime'  => "16:00",

            'isAvailableOnFriday'  => 1,
            'fridayStartingTime'  => "08:00",
            'fridayClosingTime'  => "16:00",

            'isAvailableOnSaturday'  => 0,
            'isAvailableOnSunday'  => 0,

            'timeConsultation'  => "20",
        ];
    }
}
