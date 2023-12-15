<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $g = new UserDetail;
        $g->user_name = "@user";
        $g->user_id = 9;
        $g->save();

        $g1 = new UserDetail;
        $g1->user_name = "@editor";
        $g1->user_id = 10;
        $g1->save();

        $g2 = new UserDetail;
        $g2->user_name = "@admin";
        $g2->user_id = 11;
        $g2->save();
    }
}