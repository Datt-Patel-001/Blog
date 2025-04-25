<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = \App\Models\Post::pluck('id');
        $users = \App\Models\User::pluck('id');
        for ($i = 0; $i < 150; $i++) {
            \App\Models\Comment::factory()->create([
                'post_id' => $posts->random(),
                'user_id' => $users->random(),
                 'body' => (rand(1, 20) == 1) ? 'This comment contains spam word.' : fake()->sentence(), // Add some spam
                'created_at' => \carbon\Carbon::now()->subDays(rand(1, 300)),
            ]);
        }
    }
}
