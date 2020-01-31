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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_remember')->nullable();
            $table->integer('is_active')->default(1)->nullable();
            $table->integer('created_by')->nullable();
            $table->text('api_token')->nullable();
            $table->string('api_token_expireIn')->nullable();
            $table->text('available_quizs')->nullable();
            $table->text('batch')->nullable();
            $table->text('course_name')->nullable();
            $table->text('student_courses')->nullable();
            $table->text('user_role')->nullable();
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
