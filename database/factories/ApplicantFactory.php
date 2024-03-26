<?php

namespace Database\Factories;

use App\Enums\Recommendation;
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
        $user =  User::all()->random();
        $user_id =  User::all()->random();
        return [
            'barangay_id' => Barangay::get('id')->random()->id,
            'name' => $name,
            'birthday' => $this->faker->date('Y-m-d', '2000-08-10'),
            'civil_status' => $civilStatus,
            'gender' => $gender,
            'structure' => $structure,
            'recommendation' => $this->faker->randomElement(collect(Recommendation::cases())->pluck('value')),
            'remarks' => $this->faker->paragraph(1),
            'validated_by' => $user,
            'user_id' => $user_id,
            'date_of_validation' => $this->faker->dateTimeBetween('-5 days', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-5 days', 'now'),
        ];
    }
}
