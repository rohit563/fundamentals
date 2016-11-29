<?php

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('passport');
            $table->string('driversLicense');
            $table->integer('gender');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->date('dob');
            $table->integer('type');
            $table->string('precinctID');
            $table->rememberToken();
            $table->timestamps();
        });
        
        // DB::table('users')->insert( array(
        //     'email' => 'nrtester1@gmail.com',
        //     'password' => '$2y$10$OpD.V7qSmceiMO4d/Z8rXORQqoLRj8xpa8JgSmIdxoOp5e06Wv1z.',
        //     'type' => 1,
        // ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
