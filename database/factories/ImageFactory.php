<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $imageable = fake()->randomElement([
            \App\Models\Quote::class,
            \App\Models\UserDetail::class,
        ]);

        return [
            'imageable_type' => $imageable,
            'imageable_id' => rand(1, 10),
            'path'=> fake()->imageUrl()
        ];
    }
}
