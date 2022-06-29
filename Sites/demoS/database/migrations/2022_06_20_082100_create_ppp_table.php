<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppp', function (Blueprint $table) {
            $table->id();
            $table->string('learn');
            $table->string('wot');
            $table->timestamps();
        });
        Schema::table('ppp', function (Blueprint $table) {
            $table->integer('votes');
            $table->enum('difficulty', ['easy', 'hard']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppp');
    }
}
