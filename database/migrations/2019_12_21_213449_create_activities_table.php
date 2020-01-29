<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', 50);
            $table->string('description', 50);
            $table->integer('quantity_ hours');
            $table->string('path_file', 200);

            $table->unsignedInteger('fk_status_activity_id');
            $table->foreign('fk_status_activity_id')->references('id')->on('status_activities');

            $table->unsignedInteger('fk_student_id');
            $table->foreign('fk_student_id')->references('id')->on('students');

            $table->unsignedInteger('fk_activity_group_id');
            $table->foreign('fk_activity_group_id')->references('id')->on('activity_groups');

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
        Schema::dropIfExists('activities');
    }
}
