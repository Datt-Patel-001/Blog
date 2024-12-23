<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        $admin = User::find(1);
        $user = User::find(2);

        $permissions = Permission::all()->groupBy(function ($permission) {
            return str_contains($permission->title, 'user_') ? 'user' : 'all';
        });
        
        foreach($roles as $role){
            if($role->title == 'Admin'){
                $role->permissions()->sync($permissions->flatten()->pluck('id'));
                $admin->roles()->sync([1,2]);
            }
            if($role->title == 'User'){
                $role->permissions()->sync($permissions->get('user',collect())->pluck('id'));
                $user->roles()->sync([2]);
            } 
        }
    }
}
