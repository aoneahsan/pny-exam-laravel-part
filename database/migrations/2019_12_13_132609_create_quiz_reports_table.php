<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('quiz_id')->nullable();
            $table->string('final_marks')->nullable();
            $table->string('quiz_full_marks')->nullable();
            $table->string('mark_per_question')->nullable();
            $table->string('attempted_questions')->nullable();
            $table->string('total_questions')->nullable();
            $table->string('quiz_attend_at')->nullable();
            $table->string('quiz_finish_at')->nullable();
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
        Schema::dropIfExists('quiz_reports');
    }
}
