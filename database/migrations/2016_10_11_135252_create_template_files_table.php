<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creates template files table
        Schema::create('template_files', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('file_name');
            $table->string('file');
            $table->mediumText('description');
            $table->date('upload_date'); 
            $table->string('uploaded_by');
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
        Schema::drop('template_files');
    }
}
