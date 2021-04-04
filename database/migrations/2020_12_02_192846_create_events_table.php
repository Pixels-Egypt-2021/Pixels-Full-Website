<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('year');
            $table->string('season_term');
            $table->string('participants_no');
            $table->string('sessions_no');
            $table->integer('flyers_no');
            $table->string('courses_no');
            $table->string('img');
            $table->string('video_link');
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
        Schema::dropIfExists('events');
    }
}
