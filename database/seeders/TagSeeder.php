<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['title' => 'Tips', 'slug' => 'tips'],
            ['title' => 'How-to', 'slug' => 'how-to'],
            ['title' => 'Guides', 'slug' => 'guides'],
            ['title' => 'Tutorials', 'slug' => 'tutorials'],
            ['title' => 'Case Study', 'slug' => 'case-study'],
            ['title' => 'Best Practices', 'slug' => 'best-practices'],
            ['title' => 'Resources', 'slug' => 'resources'],
            ['title' => 'Cheat Sheet', 'slug' => 'cheat-sheet'],
        
            ['title' => 'Laravel', 'slug' => 'laravel'],
            ['title' => 'PHP', 'slug' => 'php'],
            ['title' => 'JavaScript', 'slug' => 'javascript'],
            ['title' => 'Web Development', 'slug' => 'web-development'],
            ['title' => 'API', 'slug' => 'api'],
            ['title' => 'AI', 'slug' => 'ai'],
            ['title' => 'Machine Learning', 'slug' => 'machine-learning'],
            ['title' => 'DevOps', 'slug' => 'devops'],
            ['title' => 'Git', 'slug' => 'git'],
            ['title' => 'Coding', 'slug' => 'coding'],
            ['title' => 'Open Source', 'slug' => 'open-source'],
        
            ['title' => 'Wellness', 'slug' => 'wellness'],
            ['title' => 'Minimalism', 'slug' => 'minimalism'],
            ['title' => 'Productivity', 'slug' => 'productivity'],
            ['title' => 'Self-Care', 'slug' => 'self-care'],
            ['title' => 'Mindset', 'slug' => 'mindset'],
            ['title' => 'Motivation', 'slug' => 'motivation'],
            ['title' => 'Habits', 'slug' => 'habits'],
            ['title' => 'Journaling', 'slug' => 'journaling'],
        
            ['title' => 'Marketing', 'slug' => 'marketing'],
            ['title' => 'SEO', 'slug' => 'seo'],
            ['title' => 'Freelancing', 'slug' => 'freelancing'],
            ['title' => 'Startup', 'slug' => 'startup'],
            ['title' => 'Remote Work', 'slug' => 'remote-work'],
            ['title' => 'Entrepreneurship', 'slug' => 'entrepreneurship'],
            ['title' => 'Side Hustle', 'slug' => 'side-hustle'],
            ['title' => 'Networking', 'slug' => 'networking'],
        
            ['title' => 'Design', 'slug' => 'design'],
            ['title' => 'UX/UI', 'slug' => 'ux-ui'],
            ['title' => 'Photography', 'slug' => 'photography'],
            ['title' => 'Writing', 'slug' => 'writing'],
            ['title' => 'Branding', 'slug' => 'branding'],
            ['title' => 'Illustration', 'slug' => 'illustration'],
            ['title' => 'Storytelling', 'slug' => 'storytelling'],
            ['title' => 'Music', 'slug' => 'music'],
        
            ['title' => 'Budgeting', 'slug' => 'budgeting'],
            ['title' => 'Investing', 'slug' => 'investing'],
            ['title' => 'Crypto', 'slug' => 'crypto'],
            ['title' => 'Passive Income', 'slug' => 'passive-income'],
            ['title' => 'Saving', 'slug' => 'saving'],
            ['title' => 'Personal Finance', 'slug' => 'personal-finance'],
            ['title' => 'Taxes', 'slug' => 'taxes'],
        
            ['title' => 'Travel Tips', 'slug' => 'travel-tips'],
            ['title' => 'Destinations', 'slug' => 'destinations'],
            ['title' => 'Foodie', 'slug' => 'foodie'],
            ['title' => 'Backpacking', 'slug' => 'backpacking'],
            ['title' => 'Adventure', 'slug' => 'adventure'],
            ['title' => 'Local Guide', 'slug' => 'local-guide'],
            ['title' => 'Cultural Insights', 'slug' => 'cultural-insights'],
        
            ['title' => 'News', 'slug' => 'news'],
            ['title' => 'Reviews', 'slug' => 'reviews'],
            ['title' => 'Trends', 'slug' => 'trends'],
            ['title' => 'Opinions', 'slug' => 'opinions'],
            ['title' => 'Beginner', 'slug' => 'beginner'],
            ['title' => 'Advanced', 'slug' => 'advanced'],
            ['title' => 'Quick Read', 'slug' => 'quick-read'],
            ['title' => 'In-depth', 'slug' => 'in-depth'],
        ];
        
        foreach ($tags as $tag) {
            \App\Models\Tag::create([
                'title' => $tag['title'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
