<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates quizzes table
        Schema::create('quizzes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('created_by');
            $table->string('status');
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
        //Drops the quizzes table
        Schema::drop('quizzes');
    }
}
