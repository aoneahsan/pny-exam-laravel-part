<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('per_question_mark')->nullable();
            $table->string('quiz_time')->nullable();
            $table->string('quiz_price')->nullable();
            $table->string('show_answers')->nullable();
            $table->string('quiz_available')->nullable();
            $table->string('passing_percentage')->nullable();
            $table->string('quiz_type')->nullable();
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
        Schema::dropIfExists('quizzes');
    }
}
