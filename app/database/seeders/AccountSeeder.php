<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminUser = new User();
        $superAdminUser->firstname = 'Super';
        $superAdminUser->lastname = 'Admin';
        $superAdminUser->email = 'admin@odisee.be';
        $superAdminUser->password = 'Azerty123';
        $superAdminUser->role_id = 1;

        $adminUser = new User();
        $adminUser->firstname = 'Arno';
        $adminUser->lastname = 'Van Hee';
        $adminUser->email = 'arnovanhee@gmail.com';
        $adminUser->password = 'Azerty123';
        $adminUser->role_id = 2;

        $user = new User();
        $user->firstname = 'John';
        $user->lastname = 'Doe';
        $user->email = 'Johndoe@odisee.be';
        $user->password = 'Azerty123';
        $user->role_id = 3;

        $superAdminUser->save();
        $adminUser->save();
        $user->save();
    }
}
