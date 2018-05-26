<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name', 100);
            $table->string('user_role', 30);
            $table->longText('security_question');
            $table->mediumText('security_question_answer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('user_name');
        });
         Schema::table('users', function($table) {
            $table->dropColumn('user_role');
        });
        Schema::table('users', function($table) {
            $table->dropColumn('security_question');
        });
        Schema::table('users', function($table) {
            $table->dropColumn('security_question_answer');
        });
    }
}
