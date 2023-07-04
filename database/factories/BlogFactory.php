<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(),
            'title' => fake()->title(),
            'image_url' => 'https://blog.hubspot.com/hubfs/Basic%20URL%20Parts_72-01%20(1).jpg',
            'intro' => fake()->text(30),
            'body' => fake()->text(200),

        ];
    }
}
