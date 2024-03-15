<?php

namespace Database\Factories;

use App\Models\Barangay;
use App\Models\HousingOccupancy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $civilStatus = $this->faker->randomElement(['Single', 'Married', 'Widowed', 'Divorced']);
        $structure = $this->faker->randomElement(['With Structure', 'No Structure']);
        $gender = $this->faker->randomElement(['Male', 'Female']);
        $name = $this->faker->name($gender);
        // User::all()->random()->id,
        return [
            'barangay_id' => Barangay::get('id')->random()->id,
            'name' => $name,
            'birthday' => $this->faker->date('Y-m-d', '2000-08-10'),
            'civil_status' => $civilStatus,
            'gender' => $gender,
            'structure' => $structure,
            'recommendation' => $this->faker->paragraph(1),
            'remarks' => $this->faker->paragraph(1),
            'user_id' => User::factory(),
        ];
    }
}
