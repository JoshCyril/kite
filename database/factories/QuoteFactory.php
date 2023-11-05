<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->realTextBetween(64, 124),
            'explanation' => fake()->realTextBetween(124, 256),
            'cover_image' => fake()->optional()->imageUrl(),
            'author' => fake()->firstName(),
            'quoted_at' => now(),
            'user_detail_id' => fake()->randomElement(
                \App\Models\User::pluck('id', 'id')->toArray()
            ) // picks id from UserDetails table randomly
        ];
    }
}