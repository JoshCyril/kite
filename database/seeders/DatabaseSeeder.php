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
        \App\Models\User::factory(10)
            ->create();
        // \App\Models\UserDetail::factory(10)
        //     ->has(\App\Models\Quote::factory(2))
        //     ->create();

        \App\Models\UserDetail::factory(10)
            ->create();

        \App\Models\Category::factory(7)
            ->create();

        \App\Models\Quote::factory(15)
            ->hasAttached(
                \App\Models\Category::factory(2)
            )
            ->create();


        // Seeder
        // $this->call(UserTableSeeder::class);
        // $this->call(UserDetailTableSeeder::class);
        // $this->call(QuoteTableSeeder::class);
    }
}
