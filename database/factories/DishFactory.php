<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\Restaurant; // Required for restaurant_id
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // For string manipulation if needed

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dish::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Define possible base dish names
        $dishNames = ['Pizza', 'Pasta', 'Burger', 'Salad', 'Soup', 'Steak', 'Curry', 'Tacos', 'Sushi', 'Ramen', 'Sandwich'];
        $dishModifiers = ['Deluxe', 'Spicy', 'Classic', 'Gourmet', 'Special', 'House', 'Supreme', 'Veggie'];


        return [
            // Assign a restaurant_id. Requires Restaurant seeder to run first.
            'restaurant_id' => function () {
                if (Restaurant::count() > 0) {
                    return Restaurant::inRandomOrder()->first()->id;
                }
                 // Fallback: Create a new Restaurant if none exist (optional)
                // return Restaurant::factory()->create()->id;
                return null; // Or return null if restaurant_id is nullable and Restaurant seeder MUST run first
            },

            // Generate a plausible dish name
            'name' => $this->faker->randomElement($dishModifiers) . ' ' . $this->faker->randomElement($dishNames),

            // Generate a realistic price (e.g., between 5.00 and 45.00)
            'price' => $this->faker->randomFloat(2, 5, 45), // 2 decimal places, min 5, max 45

            // Timestamps (created_at, updated_at) are handled automatically.
        ];
    }
}
