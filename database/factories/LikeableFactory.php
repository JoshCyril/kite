<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Likeable>
 */
class LikeableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ele =fake()->boolean();

            if (fake()->boolean()){
                return [
                    "likeable_id"=>fake()->randomElement(
                        \App\Models\User::pluck('id', 'id')->toArray()
                    ),
                    "likeable_type"=>"\App\Models\User"
                ];
            }else{
                return [
                    "likeable_id"=>fake()->randomElement(
                        \App\Models\Quote::pluck('id', 'id')->toArray()
                    ),
                    "likeable_type"=>"\App\Models\Quote"
                ];
            }


    }
}