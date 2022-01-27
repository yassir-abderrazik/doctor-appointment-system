<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Region;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => User::where('type', 'doctor')->inRandomOrder()->first()->id,
            'speciality' => Specialty::inRandomOrder()->first()->specialty,
            'ville' => Region::inRandomOrder()->first()->ville,
            'numeroTel' => '0611223344',
            'tarif' => '200',
            'profilePhoto' => '/Linnie Powlowski I/doctor.jpg'
        ];
    }
}
