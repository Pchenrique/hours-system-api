<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('registration', 30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);

            $table->unsignedInteger('fk_user_group_id');
            $table->foreign('fk_user_group_id')->references('id')->on('user_groups');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
