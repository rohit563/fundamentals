<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zipcode')->unique();
            $table->string('precinctID');
        });
        DB::table('zipcodes')->insert( array(
            'zipcode' => '82001',
            'precinctID' => '1AW',
        ));
        DB::table('zipcodes')->insert( array(
            'zipcode' => '82716',
            'precinctID' => '1BW',
        ));
        DB::table('zipcodes')->insert( array(
            'zipcode' => '83238',
            'precinctID' => '1AI',
        ));
        DB::table('zipcodes')->insert( array(
            'zipcode' => '83448',
            'precinctID' => '1BI',
        ));
        DB::table('zipcodes')->insert( array(
            'zipcode' => '98002',
            'precinctID' => '1AWA',
        ));
        DB::table('zipcodes')->insert( array(
            'zipcode' => '98101',
            'precinctID' => '1BWA',
        ));
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('zipcodes');
    }
}
