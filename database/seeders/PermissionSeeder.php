<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'medicine-list',
            'medicine-create',
            'medicine-edit',
            'medicine-delete',
            'distributor-list',
            'distributor-create',
            'distributor-edit',
            'distributor-delete',
            'purchase-list',
            'purchase-create',
            'purchase-edit',
            'purchase-delete',
            'sale-list',
            'sale-create',
            'sale-edit',
            'sale-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
