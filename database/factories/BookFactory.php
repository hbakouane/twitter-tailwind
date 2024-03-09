<?php

namespace Database\Factories;

use App\Exceptions\AuthorIsNotActiveException;
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
        $author = Author::find(2);

        if (!$author->is_active) {
            throw new AuthorIsNotActiveException();
        }

        return [
            'author_id' => $author,
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(0, 9999),
            'quantity' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
