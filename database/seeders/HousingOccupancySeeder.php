<?php

namespace Database\Seeders;

use App\Models\HousingOccupancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousingOccupancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $housingStatuses = [
            'House  Owner',
            'Renter',
            'Sharer',
            'Land Owner',
        ];

        foreach ($housingStatuses as $housingStatus) {
            HousingOccupancy::create(['description' => $housingStatus]);
        }
    }
}
