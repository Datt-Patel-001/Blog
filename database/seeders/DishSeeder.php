<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = \App\Models\Restaurant::all();
        $dishNames = ['Pizza Margherita', 'Pasta Carbonara', 'Butter Chicken', 'Tacos al Pastor', 'Sushi Platter', 'Cheeseburger', 'Salad Bowl', 'Ramen Noodles', 'Spring Rolls'];

        foreach ($restaurants as $restaurant) {
            $numDishes = rand(3, 8);
            for ($i = 0; $i < $numDishes; $i++) {
                \App\Models\Dish::factory()->create([
                    'restaurant_id' => $restaurant->id,
                    'name' => $dishNames[array_rand($dishNames)] . ' ' . Str::random(3), // Add variety
                    'price' => rand(500, 3000) / 100, // Price between 5.00 and 30.00
                ]);
            }
        }
    }
}
