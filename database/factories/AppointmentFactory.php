<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => User::where('type', 'patient')->inRandomOrder()->first()->id,
            'doctor_id' => User::where('type', 'doctor')->inRandomOrder()->first()->id,
            'title' => $this->faker->word,
            'start'=> $this->faker->dateTime($max = 'now'),
            'end' => $this->faker->dateTime($max = 'now'),
            'gender' => 'male',
            'raisonsSymptômes' => $this->faker->text($maxNbChars = 100),
            'state' => $this->faker->boolean
        ];
    }
}
