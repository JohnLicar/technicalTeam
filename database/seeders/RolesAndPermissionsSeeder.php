<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create applicant']);
        Permission::create(['name' => 'edit applicant']);
        Permission::create(['name' => 'delete applicant']);
        Permission::create(['name' => 'view applicant']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create purok']);
        Permission::create(['name' => 'view purok']);
        Permission::create(['name' => 'edit purok']);
        Permission::create(['name' => 'delete purok']);


        $validatorPermission = [
            'create applicant',
            'view applicant'
        ];

        Role::create(['name' => 'guest']);

        // or may be done by chaining
        Role::create(['name' => 'validator'])
            ->givePermissionTo($validatorPermission);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}
