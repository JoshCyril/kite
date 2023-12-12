<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $content = fake()->sentence();
        return [
            'content' => $content,
            'slug'=>Str::slug($content),
            'cover_image'=>fake()->imageUrl(),
            'explanation' => fake()->paragraph(10),
            'author' => fake()->firstName(),
            'quoted_at' => fake()->dateTimeBetween('-1 Week', '+1 Week'),
            'featured' => fake()->boolean(30),

            'user_detail_id' => fake()->randomElement(
                \App\Models\UserDetail::pluck('id', 'id')->toArray()
            ) // picks id from UserDetails table randomly
        ];
    }
}