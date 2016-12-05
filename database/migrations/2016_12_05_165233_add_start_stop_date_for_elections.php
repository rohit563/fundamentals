<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartStopDateForElections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elections', function($table) {
        $table->dateTime('startDate');
        $table->dateTime('endDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elections', function($table) {
        $table->dropColumn('startDate');
        $table->dropColumn('endDate');
        });
    }
}
