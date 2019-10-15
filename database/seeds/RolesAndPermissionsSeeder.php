<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'admin','name' => 'read admins']);
        Permission::create(['guard_name' => 'admin','name' => 'edit admins']);
        Permission::create(['guard_name' => 'admin','name' => 'delete admins']);
        Permission::create(['guard_name' => 'admin','name' => 'add admins']);
		//
		Permission::create(['guard_name' => 'admin','name' => 'read languages']);
		Permission::create(['guard_name' => 'admin','name' => 'edit languages']);
        Permission::create(['guard_name' => 'admin','name' => 'delete languages']);
        Permission::create(['guard_name' => 'admin','name' => 'add languages']);
		//
		Permission::create(['guard_name' => 'admin','name' => 'read cities']);
		Permission::create(['guard_name' => 'admin','name' => 'edit cities']);
        Permission::create(['guard_name' => 'admin','name' => 'delete cities']);
        Permission::create(['guard_name' => 'admin','name' => 'add cities']);
		//
		Permission::create(['guard_name' => 'admin','name' => 'read countries']);
		Permission::create(['guard_name' => 'admin','name' => 'edit countries']);
        Permission::create(['guard_name' => 'admin','name' => 'delete countries']);
        Permission::create(['guard_name' => 'admin','name' => 'add countries']);
        //
		Permission::create(['guard_name' => 'admin','name' => 'read categories']);
		Permission::create(['guard_name' => 'admin','name' => 'edit categories']);
        Permission::create(['guard_name' => 'admin','name' => 'delete categories']);
        Permission::create(['guard_name' => 'admin','name' => 'add categories']);
        //
		Permission::create(['guard_name' => 'admin','name' => 'read sub_categories']);
		Permission::create(['guard_name' => 'admin','name' => 'edit sub_categories']);
        Permission::create(['guard_name' => 'admin','name' => 'delete sub_categories']);
        Permission::create(['guard_name' => 'admin','name' => 'add sub_categories']);
        //hotels
		Permission::create(['guard_name' => 'admin','name' => 'read hotels']);
		Permission::create(['guard_name' => 'admin','name' => 'edit hotels']);
        Permission::create(['guard_name' => 'admin','name' => 'delete hotels']);
        Permission::create(['guard_name' => 'admin','name' => 'add hotels']);
        //tours
		Permission::create(['guard_name' => 'admin','name' => 'read tours']);
		Permission::create(['guard_name' => 'admin','name' => 'edit tours']);
        Permission::create(['guard_name' => 'admin','name' => 'delete tours']);
        Permission::create(['guard_name' => 'admin','name' => 'add tours']);
        //reviews
		Permission::create(['guard_name' => 'admin','name' => 'read reviews']);
		Permission::create(['guard_name' => 'admin','name' => 'edit reviews']);
        Permission::create(['guard_name' => 'admin','name' => 'delete reviews']);
        Permission::create(['guard_name' => 'admin','name' => 'add reviews']);
        //slider
		Permission::create(['guard_name' => 'admin','name' => 'read slider']);
		Permission::create(['guard_name' => 'admin','name' => 'edit slider']);
        Permission::create(['guard_name' => 'admin','name' => 'delete slider']);
        Permission::create(['guard_name' => 'admin','name' => 'add slider']);
        //settings
		Permission::create(['guard_name' => 'admin','name' => 'manage settings']);
        Permission::create(['guard_name' => 'admin','name' => 'manage contacts']);
        Permission::create(['guard_name' => 'admin','name' => 'manage subscribers']);
        Permission::create(['guard_name' => 'admin','name' => 'manage reservations']);

        // create roles and assign created permissions

        // $role = Role::create(['guard_name' => 'admin','name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
    }
}
