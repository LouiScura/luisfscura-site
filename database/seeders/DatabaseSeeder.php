<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory(3)->create();

        Post::factory(3)->create()->each(function ($post) use ($categories){
            $randomCategories = $categories->random(rand(1, 3));
            $post->categories()->attach($randomCategories);
        });

        $tags = Tag::factory(3)->create();

        Project::factory(4)->create()->each(function ($project) use ($tags) {
            $randomTags = $tags->random(rand(1, 3));
            $project->tags()->attach($randomTags);
        });
    }
}
