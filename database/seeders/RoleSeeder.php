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
            ->orWhere('name', 'like', '%distributor%')
            ->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'Gudang']);
        $permissions = Permission::where('name', 'like', '%purchase%')
            ->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);


        $role = Role::create(['name' => 'Kasir']);
        $permissions = Permission::where('name', 'like', '%sale%')
            ->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'Pemilik']);
        $permissions = Permission::where('name', 'like', '%medicine-list%')
            ->orWhere('name', 'like', '%distributor-list%')
            ->orWhere('name', 'like', '%purchase-list%')
            ->orWhere('name', 'like', '%sale-list%')
            ->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
    }
}
