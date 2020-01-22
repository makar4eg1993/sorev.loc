<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {

            $table->bigInteger('game_type_id')->unsigned()->change();
            $table->foreign('game_type_id')->references('id')->on('game_types');
        });
        Schema::table('matches', function (Blueprint $table) {

            $table->bigInteger('tournament_id')->unsigned()->change();
            $table->foreign('tournament_id')->references('id')->on('tournaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {

            $table->dropForeign('game_type_id');
            $table->integer('game_type_id')->change();
        });
        Schema::table('matches', function (Blueprint $table) {

            $table->dropForeign('tournament_id');
            $table->integer('tournament_id')->change();
        });
    }
}
