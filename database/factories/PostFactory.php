<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'user_id' => $this->faker->numberBetween(1,3),
            'category_id'=> $this->faker->numberBetween(1,5),
            'title' => $this->faker->sentence,
            'slug'=> $this->faker->unique->slug,
            'excerpt'=> $this->faker->sentence,
            'body'=> $this->faker->paragraph(5),
        ];
    }
}
