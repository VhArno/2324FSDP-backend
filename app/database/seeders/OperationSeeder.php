<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operation;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create operations
        $operations = [
            ['operation' => 'add'],
            ['operation' => 'edit'],
            ['operation' => 'delete'],
        ];

        Operation::insert($operations);
    }
}
