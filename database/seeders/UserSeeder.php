<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(
            [
                'name' => 'Superadmin',
                'email' => 'superadmin@mail.test',
                'password' => bcrypt('123qweasd'),
                'role' => 'Superadmin',
                'status' => true,
            ]
        );

        $user->assignRole('Superadmin');
    }
}
