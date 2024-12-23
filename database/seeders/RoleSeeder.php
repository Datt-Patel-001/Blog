<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
        [
            'id' => 1,
            'title'=>'Admin',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ],[
            'id' => 2,
            'title'=>'User',
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
        ]]);
    }
}
