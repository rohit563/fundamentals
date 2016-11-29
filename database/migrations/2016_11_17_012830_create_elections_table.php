<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Election_info');
            $table->string('Name');
            $table->string('Date');
            $table->string('Election_Type');
            $table->string('precinctID');
            $table->string('State');
            $table->boolean('isEnabled');
            $table->boolean('publishResults');
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
       Schema::drop('elections');
    }
}
