<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 100);
            $table->integer('additional_time');

            $table->unsignedInteger('fk_institution_id');
            $table->foreign('fk_institution_id')->references('id')->on('institutions');

            $table->unsignedInteger('fk_coordinator_id');
            $table->foreign('fk_coordinator_id')->references('id')->on('coordinators');

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
        Schema::dropIfExists('courses');
    }
}
