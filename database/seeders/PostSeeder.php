<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all category and tag IDs
        $categoryIds = Category::pluck('id')->toArray();
        $tagIds = Tag::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 25) as $i) {
            $title = $faker->sentence(6);
            $slug = Str::slug($title . '-' . Str::random(5));

            $post = Post::create([
                'user_id' => $faker->randomElement($userIds),
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->paragraphs(rand(3, 6), true),
                'summary' => $faker->sentence(20),
                'meta_title' => $faker->sentence(6),
                'meta_description' => $faker->sentence(12),
                'published' => true,
                'published_at' => now()->subDays(rand(0, 60)),
            ]);

            // Sync 1–3 random categories
            $post->categories()->sync($faker->randomElements($categoryIds, rand(1, 3)));

            // Sync 2–5 random tags
            $post->tags()->sync($faker->randomElements($tagIds, rand(2, 5)));
        }
    }
}
