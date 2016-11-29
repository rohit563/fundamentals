<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecinctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precincts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('precinctID')->unique();
            $table->string('precinctState');
        });
        DB::table('precincts')->insert( array(
            'precinctID' => '1AW',
            'precinctState' => 'Wyoming',
        ));
        DB::table('precincts')->insert( array(
            'precinctID' => '1BW',
            'precinctState' => 'Wyoming',
        ));
        DB::table('precincts')->insert( array(
            'precinctID' => '1AI',
            'precinctState' => 'Idaho',
        ));
        DB::table('precincts')->insert( array(
            'precinctID' => '1BI',
            'precinctState' => 'Idaho',
        ));
        DB::table('precincts')->insert( array(
            'precinctID' => '1AWA',
            'precinctState' => 'Washington',
        ));
        DB::table('precincts')->insert( array(
            'precinctID' => '1BWA',
            'precinctState' => 'Washington',
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('precincts');
    }
}
