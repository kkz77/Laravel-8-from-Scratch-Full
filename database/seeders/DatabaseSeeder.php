<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        Post::factory(20)->create();
        User::factory(3)->create();
        Category::factory(5)->create();
    }
}
