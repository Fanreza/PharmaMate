<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Superadmin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        
        $role = Role::create(['name' => 'Apoteker']);
        $permissions = Permission::where('name', 'like', '%user%')
            ->orWhere('name', 'like', '%medicine%')
            ->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);


        Role::create(['name' => 'Gudang']);
        Role::create(['name' => 'Kasir']);
        Role::create(['name' => 'Pemilik']);
    }
}
