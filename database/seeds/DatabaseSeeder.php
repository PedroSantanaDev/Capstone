<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Populates quizzes table
        /*DB::table('quizzes')->insert([
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

        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 1,
            'question' => 'Which of the following is a hazard?',
            'correct_answer' => 'Chemical Hazards',
            'wrong_answer_1' =>'Light',
            'wrong_answer_2' => 'Internet',
            'wrong_answer_3' => 'Cats',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 1,
            'question' => 'Which of the following is not hazard?',
            'correct_answer' => 'Internet',
            'wrong_answer_1' =>'Noise',
            'wrong_answer_2' => 'Dogs',
            'wrong_answer_3' => 'Bio Hazards',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 1,
            'question' => 'In case of hazard in your workplace, what should you do?',
            'correct_answer' => 'Go to a save place and report it to my supervisor',
            'wrong_answer_1' =>'Do nothing',
            'wrong_answer_2' => 'Go home',
            'wrong_answer_3' => 'Keep doing my job',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 1,
            'question' => 'Is noise a hazard?',
            'correct_answer' => 'Yes',
            'wrong_answer_1' =>'No',
            'wrong_answer_2' => 'Not sure',
            'wrong_answer_3' => 'None of the above',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 2,
            'question' => 'Is Carbon Monoxide a hazard?',
            'correct_answer' => 'Yes',
            'wrong_answer_1' =>'No',
            'wrong_answer_2' => 'Maybe',
            'wrong_answer_3' => 'None of the above',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 2,
            'question' => 'Is Carbon Monoxide a leading cause of chemical poisoning in the workplace.',
            'correct_answer' => 'Yes',
            'wrong_answer_1' =>'Maybe',
            'wrong_answer_2' => 'No',
            'wrong_answer_3' => 'None of the above',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 2,
            'question' => 'Hoe does Carbon Monoxide enter the body?',
            'correct_answer' => 'Carbon Monoxide is inhaled, and passes through the upper respiratory system.',
            'wrong_answer_1' =>'Through drinking water',
            'wrong_answer_2' => 'By eating',
            'wrong_answer_3' => 'Through the eyes',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 2,
            'question' => 'What is Carbon Monoxide?',
            'correct_answer' => 'Carbon Monoxide is a leading cause of chemical poisoning in the workplace',
            'wrong_answer_1' =>'A gas',
            'wrong_answer_2' => 'A chemical that is not bad for people',
            'wrong_answer_3' => 'A gas for cars',
        ]);

        
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 3,
            'question' => 'Are Belt Safety require to operate heavy machinary?',
            'correct_answer' => 'Yes',
            'wrong_answer_1' =>'No',
            'wrong_answer_2' => 'Sometimes',
            'wrong_answer_3' => 'Non of the above',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 3,
            'question' => 'Is violence acceptable in the workplace?',
            'correct_answer' => 'No',
            'wrong_answer_1' =>'Yes',
            'wrong_answer_2' => 'Sometimes',
            'wrong_answer_3' => 'Yes kick some people in their behind',
        ]);
        //Populates quizzes answers table
        DB::table('quizzes_answers')->insert([
            'quiz_id' => 3,
            'question' => 'in case of fire what should I do?',
            'correct_answer' => 'Find the nearest exit and exit the building',
            'wrong_answer_1' =>'Nothing',
            'wrong_answer_2' => 'Call the fire department',
            'wrong_answer_3' => 'Keep working',
        ]);
        */


        /*
        //Populates quizzes answers table
        DB::table('shifts')->insert([
            'created_by' => 'pedro.santana',
            'title' => 'Morning Shift',
            'description' =>'The early morning to afternoon shift.',
            'start' => '2016-11-14 08:00:00',
            'end' => '2016-11-18 17:00:00',
        ]);

        DB::table('shifts')->insert([
            'created_by' => 'pedro.santana',
            'title' => 'Afternoon Shift',
            'description' =>'The early evening to early afternoon shift.',
            'start' => '2016-11-14 13:00:00',
            'end' => '2016-11-18 20:00:00',
        ]);


        DB::table('shifts')->insert([
            'created_by' => 'pedro.santana',
            'title' => 'Evening Shift',
            'description' =>'The late Afternoon, part of the evening shift.',
            'start' => '2016-11-14 17:00:00',
            'end' => '2016-11-18 00:00',
        ]);


        DB::table('shifts')->insert([
            'created_by' => 'pedro.santana',
            'title' => 'Overnight Shift',
            'description' =>'Overnight hours of of work.',
            'start' => '2016-11-14 00:00',
            'end' => '2016-11-18 08:00:00',
        ]);
        */

        /*
        DB::table('assigned_shifts')->insert([
            'employee_user_id' => 28,
            'assigned_by' => 'pedro.santana',
            'title' => 'Evening Shift',
            'description' => 'The late Afternoon, part of the evening shift.',
            'start' => '2016-11-14 17:00:00',
            'end' => '2016-11-18 00:00:00',
        ]);

        DB::table('assigned_shifts')->insert([
            'employee_user_id' => 30,
            'assigned_by' => 'pedro.santana',
            'title' => 'Evening Shift',
            'description' => 'The late Afternoon, part of the evening shift.',
            'start' => '2016-11-14 17:00:00',
            'end' => '2016-11-18 00:00:00',
        ]);


       DB::table('assigned_shifts')->insert([
            'employee_user_id' => 35,
            'assigned_by' => 'pedro.santana',
            'title' => 'Morning part time',
            'description' => '4 hour morning shift',
            'start' => '2016-11-14 08:00:00',
            'end' => '2016-11-18 12:00:00',
        ]);


       DB::table('assigned_shifts')->insert([
            'employee_user_id' => 38,
            'assigned_by' => 'pedro.santana',
            'title' => 'Morning part time',
            'description' => '4 hour morning shift',
            'start' => '2016-11-14 08:00:00',
            'end' => '2016-11-18 12:00:00',
        ]);


        DB::table('assigned_shifts')->insert([
            'employee_user_id' => 39,
            'assigned_by' => 'pedro.santana',
            'title' => 'Afternoon Shift',
            'description' => 'The early evening to early afternoon shift date and time',
            'start' => '2016-11-14 13:00:00',
            'end' => '2016-11-18 20:00:00',
        ]);



          DB::table('assigned_shifts')->insert([
            'employee_user_id' => 40,
            'assigned_by' => 'pedro.santana',
            'title' => 'Afternoon Shift',
            'description' => 'The early evening to early afternoon shift date and time',
            'start' => '2016-11-14 13:00:00',
            'end' => '2016-11-18 20:00:00',
        ]);*/

        
                    
    }
}
