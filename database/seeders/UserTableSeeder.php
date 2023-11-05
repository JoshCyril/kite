<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $g = new User;
        $g->name = "test user";
        $g->email = "test@example.com";
        $g->password = "Pa&sw0rd";
        $g->save();
    }
}