<?php

namespace Database\Seeders;

use App\Enum\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'devtests@staxogroup.com',
          ], [
            'name'   => 'dev',
            'username'   => 'dev',
            'password'   => 'Welcome1',
            'role'       => UserRole::Admin,
          ]);
      
          $users = [
            [
              ['email' => 'devtests+RGS@staxogroup.com'],
              [
                'name'   => 'rgs',
                'username' => 'rgs'
              ],
            ],
          ];
      
          foreach($users as $parts)
          {
            User::firstOrCreate($parts[0], array_merge($parts[1], [
              'password'   => 'Welcome1',
              'role'       => UserRole::Admin,
            ]));
          }
      
          if(env('APP_ENV') != 'production')
          {
            foreach(UserRole::toValueKeyArray() as $key => $value)
            {
              if($value->getKey() != 'SysAdmin')
              {
                User::firstOrCreate([
                  'email' => sprintf('devtests+%s@staxogroup.com', strtolower($value->getKey())),
                ], [
                  'name' => 'Welcome',
                  'username' => 'Welcome_'.$key,
                  'password'   => 'Welcome1',
                  'role'       => $value,
                ]);
              }
            }
      
            User::factory(20)->create();
          }
        $user = User::factory()->create([
          'name' => 'Admin',
          'username' => 'admins user',
          'email' => 'admin@example.com'
        ]);
        $role = Role::create(['name' => 'Admins']);
        $user->assignRole($role);
    }
}
