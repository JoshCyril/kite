<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $g = new Quote;
        $g->user_detail_id = 11;
        $g->content = "Life is what happens when you're busy making other plans.";
        $g->explanation = "Creating a balanced life that includes meaningful work and a well-thought-out plan is essential for long-term happiness and fulfillment. Learn how to navigate these aspects of life successfully for a more fulfilling and purposeful existence.";
        $g->author = "Unknown";
        $g->quoted_at = now();
    }
}