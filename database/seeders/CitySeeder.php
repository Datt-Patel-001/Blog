<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'Metropolis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gotham', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Star City', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
