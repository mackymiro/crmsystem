<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('users')) {
			// Code to create table
			Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
			$table->string('last_name');
            $table->string('email')->unique();
			$table->date('dob');
			$table->string('profile_photo');
			$table->string('facebook_address');
			$table->string('role_type');
			$table->string('department');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
			});
		}
        
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
