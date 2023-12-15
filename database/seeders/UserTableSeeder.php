<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $g = new User;
        $g->name = "Test - User";
        $g->email = "user@mail.com";
        $g->password = '$2y$10$iiBnje4gtfPsXn2i7/EpxOk9cFKrek9MI8pPl6EECTB/NVGJBszTW';
        $g->email_verified_at = Carbon::now();
        $g->two_factor_secret= null;
        $g->two_factor_recovery_codes = null;
        $g->remember_token = "123iDj4s5x";
        $g->profile_photo_path = "profile-photos/11.jpg";
        $g->current_team_id = null;
        $g->role="USER";
        $g->save();

        $g2 = new User;
        $g2->name = "Test - Editor";
        $g2->email = "editor@mail.com";
        $g2->password = '$2y$10$iiBnje4gtfPsXn2i7/EpxOk9cFKrek9MI8pPl6EECTB/NVGJBszTW';
        $g2->email_verified_at = Carbon::now();
        $g2->two_factor_secret= null;
        $g2->two_factor_recovery_codes = null;
        $g2->remember_token = "123iDj4s5x";
        $g2->profile_photo_path = "profile-photos/1.jpg";
        $g2->current_team_id = null;
        $g2->role="EDITOR";
        $g2->save();

        $g1 = new User;
        $g1->name = "Test - Admin";
        $g1->email = "admin@mail.com";
        $g1->password = '$2y$10$iiBnje4gtfPsXn2i7/EpxOk9cFKrek9MI8pPl6EECTB/NVGJBszTW';
        $g1->email_verified_at = Carbon::now();
        $g1->two_factor_secret= null;
        $g1->two_factor_recovery_codes = null;
        $g1->remember_token = "223iDj4s5x";
        $g1->profile_photo_path = "profile-photos/20.jpg";
        $g1->current_team_id = null;
        $g1->role="ADMIN";
        $g1->save();
    }
}