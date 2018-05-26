<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populates quizzes table
        DB::table('quizzes')->insert([
            'user_id' => 1,
            'title' => 'Brochure for small business: your health and safety GPS',
            'description' => 'Time constraints, lack of resources, overabundance of regulations, economic stresses',
        	'status' =>'Active',
        	'created_by' => 'pedro.santana',
        ]);


        DB::table('quizzes')->insert([
            'user_id' => 1,
            'title' => 'Carbon Monoxide in the Workplace',
            'description' => 'Carbon monoxide (CO) is a leading cause of chemical poisoning in both the workplace',
        	'status' =>'Active',
        	'created_by' => 'pedro.santana',
        ]);

        DB::table('quizzes')->insert([
            'user_id' => 1,
            'title' => 'Guide to Conveyor Belt Safety',
            'description' => 'This guide suggests possible preventative measures so  that work on or near conveyors can be performed safely',
            'status' =>'Active',
            'created_by' => 'pedro.santana',
        ]);
    }
}
