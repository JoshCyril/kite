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
        $g->is_admin = false;
        $g->save();

        $g1 = new UserDetail;
        $g1->user_name = "@admin";
        $g1->user_id = 10;
        $g1->is_admin = true;
        $g1->save();
    }
}