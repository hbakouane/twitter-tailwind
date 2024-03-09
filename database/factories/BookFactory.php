<?php

namespace Database\Factories;

use App\Models\Author;
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
    public function definition(): array
    {
        return [
            'author_id' => 1,
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(0, 9999),
            'quantity' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
