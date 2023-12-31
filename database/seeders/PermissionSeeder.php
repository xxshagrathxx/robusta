<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permission::create(['name'=>'show_users']);
        Permission::create(['name'=>'create_users']);
        Permission::create(['name'=>'update_users']);
        Permission::create(['name'=>'delete_users']);

        // Roles
        Permission::create(['name'=>'show_roles']);
        Permission::create(['name'=>'create_roles']);
        Permission::create(['name'=>'update_roles']);
        Permission::create(['name'=>'delete_roles']);

        // Translates
        Permission::create(['name'=>'show_translates']);
        Permission::create(['name'=>'create_translates']);
        Permission::create(['name'=>'update_translates']);
        Permission::create(['name'=>'delete_translates']);

        // Stations
        Permission::create(['name'=>'show_stations']);
        Permission::create(['name'=>'create_stations']);
        Permission::create(['name'=>'update_stations']);
        Permission::create(['name'=>'delete_stations']);

        // Trips
        Permission::create(['name'=>'show_trips']);
        Permission::create(['name'=>'create_trips']);
        Permission::create(['name'=>'update_trips']);
        Permission::create(['name'=>'delete_trips']);

        // Buses
        Permission::create(['name'=>'show_buses']);
        Permission::create(['name'=>'create_buses']);
        Permission::create(['name'=>'update_buses']);
        Permission::create(['name'=>'delete_buses']);

        // Permissions
        Permission::create(['name'=>'assign_permissions']);
        Permission::create(['name'=>'update_permissions']);

        // Settings
        Permission::create(['name'=>'update_settings']);
    }
}
