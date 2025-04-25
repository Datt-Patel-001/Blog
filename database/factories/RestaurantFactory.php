<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Restaurant;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Restaurant::class;

    public function definition(): array
    {
        $cuisines = ['Italian', 'Indian', 'Mexican', 'Chinese', 'Japanese', 'Cafe', 'Thai', 'French', 'American'];

        return [
            // Generate a fake restaurant name using the company name generator
            'name' => $this->faker->company() . ' Restaurant',
            'city_id' => function () {
                 if (City::count() > 0) {
                    return City::inRandomOrder()->first()->id;
                 }
                 return null;
            },
            'cuisine_type' => $this->faker->randomElement($cuisines),
        ];
    }
}
