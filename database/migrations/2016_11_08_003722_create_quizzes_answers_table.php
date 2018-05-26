<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates quizzes answers table
        Schema::create('quizzes_answers', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')
                                      ->on('quizzes')
                                      ->onDelete('cascade');
            $table->mediumText('question');
            $table->text('correct_answer');
            $table->text('wrong_answer_1');
            $table->text('wrong_answer_2');
            $table->text('wrong_answer_3');
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
        //Drops the table template files
        Schema::drop('quizzes_answers');
    }
}
