<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->longtext('description');
            $table->longtext('components');
            $table->longtext('components_imgs');
            $table->longtext('design_imgs');
            $table->string('pcb_imgs');
            $table->longtext('steps');
            $table->longtext('code');
            $table->string('link');
            $table->string('project_imgs');
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
        Schema::dropIfExists('projects');
    }
}
