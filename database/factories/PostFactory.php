<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     // manually should be written
     protected  $model  = Post::class;
    public function definition(): array
    {
        return [
            'title' =>fake()->sentence(),
            'sub_title'=>fake()->sentence(),
            'description'=>fake()->sentence(),
            'slug' => Str::slug(fake()->sentence())
        ];
    }
}
