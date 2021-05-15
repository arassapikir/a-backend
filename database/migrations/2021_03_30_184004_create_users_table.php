<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('type')->default("user");
            $table->string('name');
            $table->integer('phone');
            $table->string('email')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('otp')->nullable();
            $table->string('status')->default("unverified");
            $table->char('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('language')->default('tk');
            $table->string('platform')->default("unverified");
            $table->string('version')->nullable();
            $table->string('ip')->nullable();
            $table->text('fcm_token')->nullable();
            $table->text('token')->nullable();
            $table->bigInteger('hits')->default(1);
            $table->timestamp('last_visited_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
