<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;


class PopulateUserSlugs extends Migration
{
    public function up()
    {
        // Fetch all existing users
        $users = User::all();

        // Generate and populate the slug for each user
        foreach ($users as $user) {
            $user->slug = Str::slug($user->username);
            $user->save();
        }
    }

    public function down()
    {
        // No need to define rollback logic for this migration
    }
}
