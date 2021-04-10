<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\User::create([
            'project_id' => 1,
            'type' => "admin",
            'name' => "Maksat",
            'phone' => 64871221,
            'phone_verified_at' => now(),
            'email' => "meredowm645@gmail.com",
            'password' => \Illuminate\Support\Facades\Hash::make("password"),
            'status' => "active",
            'gender' => "m",
            'birthday' => "1996-11-11",
            'platform' => "web",
            'language' => "tk",
            'last_visited_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
