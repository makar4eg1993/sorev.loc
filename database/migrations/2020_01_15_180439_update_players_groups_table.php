<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlayersGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {

            $table->bigInteger('group_id')->unsigned()->change();
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {

            $table->dropForeign('group_id');
            $table->integer('group_id')->change();
        });
    }
}
