<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spouse>
 */
class SpouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);
        $name = $this->faker->firstName($gender);
        $civilStatus = $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Divorced']);


        return [
            'applicant_id' => Applicant::factory(),
            'spouse_name' => $name,
            'spouse_birthday' => $this->faker->date('Y-m-d', '2000-08-10'),
            'spouse_civil_status' => $civilStatus,
            'spouse_gender' => $gender,
        ];
    }
}
