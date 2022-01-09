<?php

namespace Database\Seeders;

use App\Models\Comment;
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
        Post::factory(20)->create();
        User::factory()->create([
            'name' => 'Kaung Khant Zaw',
            'username' => 'otwo',
            'password' => bcrypt('password'),
            'email' => 'khantzawkaung2@gmail.com'
        ]);
        Comment::factory(10)->create();
    }
}
