<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlayerResultToTournamentsTable extends Migration
{

    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->integer('score_player_1')->nullable()->after('winner');
            $table->integer('score_player_2')->nullable()->after('score_player_1');
        });
    }

    public function down()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            //
        });
    }
}
