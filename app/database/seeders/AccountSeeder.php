<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $accounts = [
            [
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'email' => 'admin@odisee.be',
                'password' => 'Azerty123',
                'role_id' => '1',
            ],
            [
                'firstname' => 'Arno',
                'lastname' => 'Van Hee',
                'email' => 'arnovanhee@gmail.com',
                'password' => 'Azerty123',
                'role_id' => '2',
            ],
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'Johndoe@odisee.be',
                'password' => 'Azerty123',
                'role_id' => '3',
            ],
        ];

        User::insert($accounts);
    }
}
