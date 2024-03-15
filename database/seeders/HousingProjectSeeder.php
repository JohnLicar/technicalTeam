<?php

namespace Database\Seeders;

use App\Models\HousingProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousingProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'project' => 'NORTH HILL ARBOURS',
                'location' => 'North Hill Arbours, Brgy. 106 Sto. Niño, Tacloban City',
                'description' => 'North Hill Arbours Residents, Tacloban City'
            ],
            [
                'project' => 'ST. FRANCIS VILLAGE',
                'location' => 'St. Francis Village, Brgy. 105 Suhi, Tacloban City',
                'description' => 'St. Francis Village, Brgy. 105 Suhi, Tacloban City'
            ],
            [
                'project' => 'GUADALUPE HEIGHTS',
                'location' => 'Guadalupe Heights Village, Brgy. 105 San Isidro, Tacloban City',
                'description' => 'Guadalupe Heights Village, Brgy. 105 San Isidro, Suhi, Tacloban City'
            ],
            [
                'project' => 'GREENDALE RESIDENCE',
                'location' => 'Barangay 105, San Isidro, Suhi, Tacloban City',
                'description' => 'Barangay 105, San Isidro, Suhi, Tacloban City'
            ],
            [
                'project' => 'RIDGEVIEW PARK',
                'location' => 'Brgy. 97 Ridge View Park Cabalawan, Tacloban City',
                'description' => 'Brgy. 97 Ridge View Park Cabalawan, Tacloban City'
            ],
            [
                'project' => 'SALVACION HEIGHTS',
                'location' => 'Brgy. 104 Salvacion , Tacloban City',
                'description' => 'Brgy. 104 Salvacion , Tacloban City, Tacloban City'
            ],
            [
                'project' => 'VILLA DIANA',
                'location' => 'Brgy. 101 New Kawayan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 101 New Kawayan, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'VILLA SOFIA',
                'location' => 'Brgy. 108 Tagpuro , Tacloban City, Tacloban City',
                'description' => 'Brgy. 108 Tagpuro , Tacloban City, Tacloban City'
            ],
            [
                'project' => 'NEW HOPE VILLAGE',
                'location' => 'Brgy. 107 Sta. Elena, Tacloban City, Tacloban City',
                'description' => 'Brgy. 107 Sta. Elena, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'KNIGHTSRIDGE RESIDENCE',
                'location' => 'Brgy. 98 Camansihay, Tacloban City, Tacloban City',
                'description' => 'Brgy. 98 Camansihay, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'HABITAT VILLAGE (LOT 4428)',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'HABITAT VILLAGE (LOT 4466)',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'GMA KAPUSO VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'GPICE VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'CORE SHELTER',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'GLOBAL MEDIC',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'SOS NORTH VILLAGE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'AEROVILLE',
                'location' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City',
                'description' => 'Brgy. 106 Sto Niño, Tacloban City, Tacloban City'

            ],
            [
                'project' => 'LION\'S VILLAGE',
                'location' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'UNDP',
                'location' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City',
                'description' => 'Brgy. 97 Cabalawan, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'CRS',
                'location' => 'Brgy. 93 Bagacay, Tacloban City, Tacloban City',
                'description' => 'Brgy. 93 Bagacay, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'POPE FRANCIS',
                'location' => 'Brgy. 99 Diit, Tacloban City, Tacloban City',
                'description' => 'Brgy. 99 Diit, Tacloban City, Tacloban City'
            ],
            [
                'project' => 'SM CARES',
                'location' => 'Brgy. 101 New Kawayan , Tacloban City',
                'description' => 'Brgy. 101 New Kawayan , Tacloban City'
            ],
            [
                'project' => 'COMMUNITY OF HOPE (OB)',
                'location' => 'Brgy. 103 Palanog , Tacloban City',
                'description' => 'Brgy. 103 Palanog , Tacloban City'
            ],

        ];

        foreach ($data as $housingProject) {
            HousingProject::create(
                $housingProject
            );
        }
    }
}
