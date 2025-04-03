<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Permissions
        // Permission::create(['name' => 'manage-spheres']);
        // Permission::create(['name' => 'moderate-content']);

        // Roles
        // $admin = Role::create(['name' => 'Admin']);
        // $admin->givePermissionTo(Permission::all());

        // Role::create(['name' => 'Member']);
    }
}
