<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchesPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches_players', function (Blueprint $table) {

            $table->bigInteger('match_id')->unsigned()->change();
            $table->foreign('match_id')->references('id')->on('matches');
        });
        Schema::table('matches_players', function (Blueprint $table) {

            $table->bigInteger('player_id')->unsigned()->change();
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches_players', function (Blueprint $table) {

            $table->dropForeign('match_id');
            $table->integer('match_id')->change();
        });
        Schema::table('matches_players', function (Blueprint $table) {

            $table->dropForeign('player_id');
            $table->integer('player_id')->change();
        });
    }
}
