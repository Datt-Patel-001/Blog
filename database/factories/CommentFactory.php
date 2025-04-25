<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post; // Required for post_id
use App\Models\User; // Required for user_id
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Assign a post_id. Requires Post seeder to run first.
            'post_id' => function () {
                if (Post::count() > 0) {
                    return Post::inRandomOrder()->first()->id;
                }
                // Fallback: Create a new Post if none exist (optional, depends on desired behavior)
                // return Post::factory()->create()->id;
                return null; // Or return null if post_id is nullable and Post seeder MUST run first
            },

            // Assign a user_id. Requires User seeder to run first.
            'user_id' => function () {
                if (User::count() > 0) {
                    return User::inRandomOrder()->first()->id;
                }
                 // Fallback: Create a new User if none exist (optional)
                // return User::factory()->create()->id;
                return null; // Or return null if user_id is nullable and User seeder MUST run first
            },

            // Generate fake comment body text.
            'body' => $this->faker->paragraph(rand(1, 3)), // Generate 1 to 3 paragraphs

            // Timestamps (created_at, updated_at) are handled automatically.
        ];
    }
}