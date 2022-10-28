<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 1, 100),
            'author' => fake()->name(),
            'pages' => fake()->randomNumber(3, false),
        ];
    }
}
