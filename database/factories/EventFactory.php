<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>fake()->realText(25),
            'attribute'=>fake()->mimeType(),
            'user_agent'=>fake()->userAgent(),
            'visitor_id'=>fake()->ipv4(),
        ];
    }
}