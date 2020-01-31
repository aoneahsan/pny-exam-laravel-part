<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('quiz_id')->nullable();
            $table->text('question_text')->nullable();
            $table->text('option_a')->nullable();
            $table->text('option_b')->nullable();
            $table->text('option_c')->nullable();
            $table->text('option_d')->nullable();
            $table->longtext('code_snippets')->nullable();
            $table->longtext('answer_explanation')->nullable();
            $table->string('video_file')->nullable();
            $table->string('video_url')->nullable();
            $table->string('photo_file')->nullable();
            $table->string('photo_url')->nullable();
            $table->text('correct_answer')->nullable();
            $table->string('user_answer')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
