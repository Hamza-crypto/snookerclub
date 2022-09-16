<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_frames', function (Blueprint $table) {
            $table->id();
            $table->integer('tournament_id');
            $table->integer('score_player_1');
            $table->integer('score_player_2');
            $table->integer('break_run_player_1');
            $table->integer('break_run_player_2');
            $table->integer('increment_in_score');
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
        Schema::dropIfExists('tournament_frames');
    }
}
