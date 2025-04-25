<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = \App\Models\City::pluck('id');
        $cuisines = ['Italian', 'Indian', 'Mexican', 'Chinese', 'Japanese', 'Cafe'];

        for ($i = 0; $i < 15; $i++) {
           \App\Models\Restaurant::factory()->create([
                'city_id' => $cities->random(),
                'cuisine_type' => $cuisines[array_rand($cuisines)],
            ]);
        }
    }
}
