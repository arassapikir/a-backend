<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $project_type = \App\Models\ProjectType::create([
            "title" => "Adminstration",
            "type" => true
        ]);

        $project = \App\Models\Project::create([
            'name' => "Admin",
            'subdomain' => "admin",
            'project_type_id' => $project_type->id,
            'is_active' => true,
        ]);

        \App\Models\User::create([
            'project_id' => $project->id,
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
