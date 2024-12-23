<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;  
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Post permissions
            ['id' => 1, 'title' => 'user_create_post'],
            ['id' => 2, 'title' => 'user_read_post'],
            ['id' => 3, 'title' => 'user_update_post'],
            ['id' => 4, 'title' => 'user_delete_post'],
            ['id' => 5, 'title' => 'user_publish_post'],
            ['id' => 6, 'title' => 'user_unpublish_post'],
            ['id' => 7, 'title' => 'user_unpublish_post'],
        
            // Category permissions
            ['id' => 8, 'title' => 'user_access_category'],
            ['id' => 9, 'title' => 'user_create_category'],
            ['id' => 10, 'title' => 'user_read_category'],
            ['id' => 11, 'title' => 'user_update_category'],
            ['id' => 12, 'title' => 'user_delete_category'],
        
            // Role permissions
            ['id' => 13, 'title' => 'admin_access_role'],
            ['id' => 14, 'title' => 'admin_create_role'],
            ['id' => 15, 'title' => 'admin_read_role'],
            ['id' => 16, 'title' => 'admin_update_role'],
            ['id' => 17, 'title' => 'admin_delete_role'],
        
            // Permission permissions
            ['id' => 18, 'title' => 'admin_access_permission'],
            ['id' => 19, 'title' => 'admin_create_permission'],
            ['id' => 20, 'title' => 'admin_read_permission'],
            ['id' => 21, 'title' => 'admin_update_permission'],
            ['id' => 22, 'title' => 'admin_delete_permission'],
        
            // Tag permissions
            ['id' => 23, 'title' => 'user_create_tag'],
            ['id' => 24, 'title' => 'user_read_tag'],
            ['id' => 25, 'title' => 'user_update_tag'],
            ['id' => 26, 'title' => 'user_delete_tag'],
            ['id' => 27, 'title' => 'user_access_tag'],

            // Comment permissions
            ['id' => 28, 'title' => 'user_create_comment'],
            ['id' => 29, 'title' => 'user_read_comment'],
            ['id' => 30, 'title' => 'user_update_comment'],
            ['id' => 31, 'title' => 'user_delete_comment'],
            ['id' => 32, 'title' => 'user_approve_comment'], 
            ['id' => 33, 'title' => 'user_reject_comment'],
        ];
        
        Permission::insert($permissions);
    }
}
