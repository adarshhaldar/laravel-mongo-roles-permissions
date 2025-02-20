<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = ['view', 'create', 'edit'];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        // Create role
        $adminRole = Role::updateOrCreate(['name' => 'admin']);

        // assign permissions to the role
        $adminRole->permissions()->createMany([
            ['name' => 'view'],
            ['name' => 'create'],
            ['name' => 'edit'],
        ]);
    }
}
