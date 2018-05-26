<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Database\Seeder;

class TimeoffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 40,
            'title' => 'Timeoff request',
            'description' => 'Doctor appointment',
            'start' => '2016-11-07 10:00:00',
            'end' => '2016-11-07 13:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);

        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 36,
            'title' => 'Timeoff request',
            'description' => 'Personal matter',
            'start' => '2016-11-21 09:00:00',
            'end' => '2016-11-21 12:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);

        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 34,
            'title' => 'Timeoff request',
            'description' => 'Personal matter',
            'start' => '2016-11-21 09:00:00',
            'end' => '2016-11-21 12:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);


        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 30,
            'title' => 'Timeoff request',
            'description' => 'Dentist appointment',
            'start' => '2016-12-01 12:00:00',
            'end' => '2016-12-01 13:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);


        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 28,
            'title' => 'Timeoff request',
            'description' => 'Dentist appointment',
            'start' => '2016-11-18 08:00:00',
            'end' => '2016-11-18 11:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);


        //Populates timeoff table
        DB::table('timeoff')->insert([
            'user_id' => 37,
            'title' => 'Timeoff request',
            'description' => 'Personal matter',
            'start' => '2016-12-01 12:00:00',
            'end' => '2016-12-01 13:00:00',
        	'approve_denied_by' => null,
        	'status' =>'Pending',
        ]);
    }
}
