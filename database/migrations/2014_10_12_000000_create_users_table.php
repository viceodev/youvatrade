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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('status')->default('active');
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->integer('plan')->nullable();
            $table->string('referral_code');
            $table->string('referral')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('role');
            $table->string('balance')->nullable();
            $table->string('banned')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('last_payed')->nullable();
            $table->string('password');
            $table->rememberToken();
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
