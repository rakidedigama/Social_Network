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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username','30')->unique();
            $table->string('fname','60');
            $table->string('lname','60');
            $table->string('email','50')->unique();
            $table->string('password','255');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('gender','7');
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
