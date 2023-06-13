<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            'title' => $title = fake()->words(rand(1, 5), true),
            'description' => fake()->text(),
            'image' => Storage::putFile('book-cover', fake()->image()),
            'price' => fake()->randomFloat(2, 1, 100),
            'pages' => fake()->randomNumber(3, false),
            'slug' => Str::slug($title),
        ];
    }
}
