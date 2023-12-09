<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quote_id' => fake()->randomElement(
                \App\Models\Quote::pluck('id', 'id')->toArray()
            ), // picks id from UserDetails table
            'user_detail_id' => fake()->randomElement(
                \App\Models\UserDetail::pluck('id', 'id')->toArray()
            ), // picks id from UserDetails table
            'body'=>fake()->realText(256),
        ];
    }
}