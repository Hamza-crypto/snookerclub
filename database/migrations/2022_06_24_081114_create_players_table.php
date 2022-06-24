<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->date('dob');
            $table->text('birth_place');
            $table->text('residence')->nullable();
            $table->text('plays_with')->nullable();
            $table->integer('professional_since')->nullable();
            $table->text('won_lost')->nullable();
            $table->text('titles')->nullable();
            $table->integer('earnings')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('players');
    }
}
