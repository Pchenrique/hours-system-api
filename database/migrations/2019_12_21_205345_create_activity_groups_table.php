<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_groups', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name',50);
            $table->string('drescription',100);
            $table->integer('amount_hours');

            $table->unsignedInteger('fk_course_id');
            $table->foreign('fk_course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('activity_groups');
    }
}
