<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialisation;

class SpecialisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $specialisations = [
            [
                'name' => 'Telecommunications Engineer',
                'description' => 'Elektronica'
            ],
            [
                'name' => 'Internet of Things Developer',
                'description' => 'Elektronica'
            ],
            [
                'name' => 'Network & Security Engineer',
                'description' => 'ICT'
            ],
            [
                'name' => 'Software & AI Developer',
                'description' => 'ICT'
            ],
            [
                'name' => 'Web Developer',
                'description' => 'ICT'
            ],
        ];

        Specialisation::insert($specialisations);
    }
}
