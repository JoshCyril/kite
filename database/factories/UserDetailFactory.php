<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_name' => '@' . fake()->unique()->userName(), // @testuser
            'is_admin' => fake()->boolean(20),
            'user_id' => fake()->unique()
                ->randomElement(
                    \App\Models\User::pluck('id', 'id')->toArray()
                ) // picks unique id from Users table randomly
        ];
    }
}
