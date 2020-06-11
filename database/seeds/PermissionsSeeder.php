<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_arr = [];
        array_push($permission_arr, Permission::create(['name' => 'edit articles']));
        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'edit articles']);  
    }
}