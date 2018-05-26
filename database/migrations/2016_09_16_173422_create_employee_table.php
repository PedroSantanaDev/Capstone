<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *Creates the "employee" table with relationship to "users" table
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade')
                                      ->onUpdate('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('title');
            $table->bigInteger('employee_no')->unsigned();
            $table->date('hire_date');
            $table->date('birthdate');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('home_phone_no');
            $table->string('cellphone_no');
            $table->string('email')->unique();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Allows us to drop the table and re-run our create 
     * table script on the up() function of this class.
     * Just run "php artisan migrate:refresh"
     * from the command line
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
