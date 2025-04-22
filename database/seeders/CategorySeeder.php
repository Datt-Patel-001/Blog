<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Technology',
                'children' => [
                    [
                        'title' => 'Programming',
                        'children' => [
                            [
                                'title' => 'Web Development',
                                'children' => [
                                    [
                                        'title' => 'Frontend',
                                        'children' => [
                                            ['title' => 'React'],
                                            ['title' => 'Vue.js'],
                                            ['title' => 'Alpine.js'],
                                        ],
                                    ],
                                    [
                                        'title' => 'Backend',
                                        'children' => [
                                            ['title' => 'Laravel'],
                                            ['title' => 'Node.js'],
                                        ],
                                    ],
                                ],
                            ],
                            ['title' => 'Mobile Development'],
                        ],
                    ],
                    ['title' => 'AI & Machine Learning'],
                    ['title' => 'Cybersecurity'],
                ],
            ],
            [
                'title' => 'Health',
                'children' => [
                    ['title' => 'Nutrition'],
                    ['title' => 'Mental Health'],
                    [
                        'title' => 'Fitness',
                        'children' => [
                            ['title' => 'Workout Routines'],
                            ['title' => 'Yoga'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Travel',
                'children' => [
                    ['title' => 'Adventure Travel'],
                    ['title' => 'Luxury Travel'],
                    [
                        'title' => 'Guides',
                        'children' => [
                            ['title' => 'Europe'],
                            ['title' => 'Asia'],
                            ['title' => 'South America'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Food',
                'children' => [
                    ['title' => 'Recipes'],
                    ['title' => 'Vegan'],
                    [
                        'title' => 'World Cuisine',
                        'children' => [
                            ['title' => 'Italian'],
                            ['title' => 'Mexican'],
                            [
                                'title' => 'Asian',
                                'children' => [
                                    ['title' => 'Japanese'],
                                    ['title' => 'Thai'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Finance',
                'children' => [
                    ['title' => 'Investing'],
                    ['title' => 'Cryptocurrency'],
                    ['title' => 'Saving Tips'],
                ],
            ],
        ];
        
        foreach ($categories as $category) {
            $this->createCategory($category);
        }
    }

    private function createCategory(array $category , $parentId = null)
    {
        $newCategory = Category::create( ['title' => $category['title'],
                                          'slug'=> Str::slug($category['title']), 
                                          'parent_id' => $parentId,
                                          'created_at' => Carbon::now(),
                                          'updated_at'=>Carbon::now()] );

        if (isset($category['children'])) {
            foreach ($category['children'] as $child) {
                $this->createCategory($child, $newCategory->id);
            }
        }
    }
}
