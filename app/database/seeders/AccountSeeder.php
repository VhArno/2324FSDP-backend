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
        // Superadmin
        $superAdminUser = new User();
        $superAdminUser->firstname = 'Super';
        $superAdminUser->lastname = 'Admin';
        $superAdminUser->email = 'admin@odisee.be';
        $superAdminUser->password = 'Azerty123';
        $superAdminUser->role_id = 1;

        // Admin
        $adminUser = new User();
        $adminUser->firstname = 'Arno';
        $adminUser->lastname = 'Van Hee';
        $adminUser->email = 'arnovanhee@gmail.com';
        $adminUser->password = 'Azerty123';
        $adminUser->role_id = 2;

        // Users
        $user1 = new User();
        $user1->firstname = 'Bart';
        $user1->lastname = 'Delrue';
        $user1->email = 'bart.delrue@odisee.be';
        $user1->password = 'Azerty123';
        $user1->role_id = 3;

        $user2 = new User();
        $user2->firstname = 'Joris';
        $user2->lastname = 'Maervoet';
        $user2->email = 'joris.maervoet@odisee.be';
        $user2->password = 'Azerty123';
        $user2->role_id = 3;

        $user = new User();
        $user->firstname = 'John';
        $user->lastname = 'Doe';
        $user->email = 'Johndoe@odisee.be';
        $user->password = 'Azerty123';
        $user->role_id = 3;

        $superAdminUser->save();
        $adminUser->save();
        $user1->save();
        $user2->save();
        $user->save();
    }
}
