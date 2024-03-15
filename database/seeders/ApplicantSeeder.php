<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\HousingOccupancy;
use Database\Factories\HousingOccupancyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applicant::factory()
            ->hasAttached(
                HousingOccupancy::factory()->count(2)
            )->create();
    }
}
