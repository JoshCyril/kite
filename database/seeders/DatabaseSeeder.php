<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Model Factory
        \App\Models\User::factory(8)
            ->hasAttached(
                \App\Models\Like::factory()->count(3),
            )->create();

        \App\Models\UserDetail::factory(8)
            ->create();

        \App\Models\Quote::factory(20)
            ->hasAttached(
                \App\Models\Category::factory(2)

            )
            ->hasAttached(
                \App\Models\Like::factory()->count(3),
            )
           ->create();

        \App\Models\Comment::factory(12)
            ->create();


        \App\Models\Event::factory(8)
            ->create();



        // \App\Models\Likeable::factory(20)
        //     ->create();

        // \App\Models\Quote::factory()
        //     ->hasAttached(
        //         \App\Models\Like::factory()->count(3),
        //         ['public' => true]
        //     )
        //     ->create();

        //Seeder
        $this->call(UserTableSeeder::class);
        $this->call(UserDetailTableSeeder::class);

    }
}