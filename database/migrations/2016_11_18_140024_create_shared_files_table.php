<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates template files table
        Schema::create('shared_files', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade');
            $table->string('file_name');
            $table->string('file');
            $table->mediumText('description');
            $table->date('shared_date'); 
            $table->string('shared_by');
            $table->string('shared_with');
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
        Schema::drop('shared_files');
    }
}
