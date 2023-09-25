<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create role
        //create role
        $role = Role::create(['name' => 'Super Admin']);
        $role = Role::create(['name' => 'WSFS Admin']);
        $role = Role::create(['name' => 'Hugo Admin']);
        $role = Role::create(['name' => 'Site Admin']);
        $role = Role::create(['name' => 'Registration Admin User']);
        $role = Role::create(['name' => 'General Admin User']);
        $role = Role::create(['name' => 'Registration Staff User']);
        $role = Role::create(['name' => 'Hugo Staff User']);
        $role = Role::create(['name' => 'Site Staff']);

        // //permission list as array
        // $permissions = [
        //     'user-list',
        //     'user-create',
        //     'user-edit',
        //     'user-delete',
        //     'user-import',
        //     'user-export',

        //     'profile-index',

        //     'role-list',
        //     'role-create',
        //     'role-edit',
        //     'role-delete',

        //     'permission-list',
        //     'permission-create',
        //     'permission-edit',
        //     'permission-delete',

        //     'participant-list',
        //     'participant-create',
        //     'participant-edit',
        //     'participant-delete',
        //     'participant-import',
        //     'participant-export',
        //     'participant-membership-list',
        //     'participant-membership-export',
            
        //     'buil-email-send',

        //     'user-activity',
            
        //     'log-view',
        // ];

        // //create and assign permission 
        // for($i=0; $i<count($permissions); $i++)
        // {
        //     $permission = Permission::create(['name' => $permissions[$i]]);

        //     $role->givePermissionTo($permission);
        //     $permission->assignRole($role);
        // }
    }
}
