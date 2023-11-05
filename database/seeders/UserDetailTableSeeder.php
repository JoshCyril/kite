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
        $g->user_name = "@test.user";
        $g->user_id = 11;
        $g->is_admin = true;
        $g->save();
    }
}
