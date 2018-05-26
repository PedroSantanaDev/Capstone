<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //Creates events table
        Schema::create('assigned_shifts', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('employee_user_id')->unsigned();
            $table->foreign('employee_user_id')->references('user_id')
                                      ->on('employees')
                                      ->onDelete('cascade');
            $table->string('assigned_by');
            $table->string('title');
            $table->mediumText('description');
            $table->dateTime('start');
            $table->dateTime('end');
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
        //Drops assigned shifts table
        Schema::drop('assigned_shifts');
    }
}
