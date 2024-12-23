<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [   
                'id' => 1,
                'user_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'profile_created_at' => Carbon::now(),
                'password' => Hash::make('111'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [  
                'id' => 2,
                'user_name' => 'User',
                'email' => 'user@gmail.com',
                'email_verified_at' => Carbon::now(),
                'profile_created_at' => Carbon::now(),
                'password' => Hash::make('222'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
