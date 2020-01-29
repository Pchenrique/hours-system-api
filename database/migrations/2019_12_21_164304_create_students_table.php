<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('fk_status_student_id');
            $table->foreign('fk_status_student_id')->references('id')->on('status_students');

            $table->unsignedInteger('fk_user_id');
            $table->foreign('fk_user_id')->references('id')->on('users');

            $table->unsignedInteger('fk_institution_id');
            $table->foreign('fk_institution_id')->references('id')->on('institutions');

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
        Schema::dropIfExists('students');
    }
}
