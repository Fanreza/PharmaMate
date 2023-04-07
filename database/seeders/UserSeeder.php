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
                'status' => true,
            ]
        );

        $user->assignRole('Superadmin');

        $user = User::create(
            [
                'name' => 'Apoteker',
                'email' => 'apoteker@mail.test',
                'password' => bcrypt('123qweasd'),
                'status' => true,
            ]
        );

        $user->assignRole('Apoteker');


        $user = User::create(
            [
                'name' => 'Gudang',
                'email' => 'gudang@mail.test',
                'password' => bcrypt('123qweasd'),
                'status' => true,
            ]);

        $user->assignRole('Gudang');

        $user = User::create(
            [
                'name' => 'Kasir',
                'email' => 'kasir@mail.test',
                'password' => bcrypt('123qweasd'),
                'status' => true,
            ]);
        
        $user->assignRole('Kasir');

        $user = User::create(
            [
                'name' => 'Pemilik',
                'email' => 'pemilik@mail.test',
                'password' => bcrypt('123qweasd'),
                'status' => true,
            ]);

        $user->assignRole('Pemilik');
    }
}
