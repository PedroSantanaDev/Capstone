<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Session;
use App\Quiz;
use DB;
use App\User;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('pages.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the event fields
        $this->validate($request, [
            'quiz_title' => 'string|required|max:255|min:2',
            'description' =>'required|string|max:255|min:2'
        ]);

        //Array of questions, wrong and right answers
        $dataSet = $request['questions'];

        //Creates a quiz
        $quiz = Quiz::create([
            'user_id' => Auth::user()->id,
            'created_by' => Auth::user()->user_name,
            'title' => $request['quiz_title'],
            'description' => $request['description'],
            'status' =>'Active',
        ]);

               
        

      //Loop through count of questions  
      for ($x = 0; $x <  count($dataSet); $x++){
        $j = 0; //To index values
        $data = ""; //Temp Array

        //A question
        $question = $dataSet[$x]['question'];

        $data[$j]  = $quiz->id; //Quiz id
        $j++; //Increments j

        //Add question to array
        $data[$j] = $question;
        $j++; //Increments j

        //Keys of our array correctAnswers, wrongAnswers, question
        $arrayKeys = array_keys($dataSet[$x]);

            //Loops through the keys
            foreach ($arrayKeys as  $value) {
               if($value == "correctAnswers"){
                   foreach ($dataSet[$x][$value] as $item) {
                        $data[$j] = $item; //Adds correct answer to array
                        $j++; //Increments j
                   }
                }
                if ($value == "wrongAnswers") {
                    foreach ($dataSet[$x][$value] as $item) {
                        $data[$j] = $item; //Adds wrong answer to array
                        $j++; //Increments j
                   }
                }
            }

            
           //Insert the questions and answers into the database    
            DB::table('quizzes_answers')->insert([
                'quiz_id' => $data[0],
                'question' => $data[1],
                'wrong_answer_3' => $data[2],
                'wrong_answer_1' => $data[3],
                'wrong_answer_2' => $data[4],
                'correct_answer' => $data[5],
            ]);
       }
       //Success message after insert
        Session::flash('success', 'Quiz created successfully!');
        
        return redirect('/quizzes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get a quiz and loads the edit quiz form
        $quiz = Quiz::find($id);
                
        return view('pages.quizzes.edit', compact('quiz'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Finds a quiz
        $quiz = Quiz::find($id);

        //Validates the event fields
        $this->validate($request, [
            'quiz-title' => 'string|required|max:255|min:2',
            'quiz-description' =>'required|string'
        ]);

        //Populates the event object
        $quiz->title = $request['quiz-title'];
        $quiz->description = $request['quiz-description'];

        //saves the data in database
        $quiz->save();

        Session::flash('success', 'Quiz updated successfully!');
        return redirect('/quizzes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get a quiz and loads the edit quiz form
        $quiz = Quiz::find($id);
        $quiz->delete();

        Session::flash('success', 'Quiz deleted successfully!');
        return redirect('/quizzes');
    }

     /**
     *  Loads the take quiz view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function take($id)
    {
        try{
            //Gets quiz data
            $quiz = Quiz::find($id);

            //Gets quiz questions and answers
            $quizQA = DB::table('quizzes_answers')
                        ->where('quizzes_answers.quiz_id', $id)
                        ->get();
            return view('pages.quizzes.take')
                ->with('quiz', $quiz)
                ->with('quizQA', $quizQA);
        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

     /**
     *  A quiz has been submitted
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, $id)
    {
        $quiz = Quiz::find($id);

        //Gets the correct answers
        $quizQA = DB::table('quizzes_answers')
                    ->where('quizzes_answers.quiz_id', $id)
                    ->select('correct_answer')
                    ->get();

        //Gets the number of question for the quiz
        $nQuestions = DB::table('quizzes_answers')
                    ->where('quizzes_answers.quiz_id', $id)
                    ->count();
       
        $correct = 0;  //To store the number of correct answers

        $nQ = $nQuestions; //To calculate the score

        //Loops through all the questions
        while($nQuestions > 0)
        {
            //Our radio button names are "option" + number of the question
            $option = 'option'.$nQuestions;

            foreach ($quizQA  as $QA) {
                //Check if the answers is correct, if so increment correct
                if($QA->correct_answer == $request[$option])
                {
                    $correct++;
                }
            }
            $nQuestions--;
        }

        //The users score
        $score = $correct / $nQ * 100 ;

        //Stores the submitted quiz
        DB::table('submitted_quizzes')->insert(
            ['user_id' => Auth::user()->id,
            'quiz_id' => $quiz->id,
            'title' => $quiz->title,
            'score' => $score
            ]
        );

        //Informs the user of its score
        if($score > 80)
        {
            Session::flash('success', 'Quiz submitted successfully. Your score is: ' . $score .'%');
        }else{
            Session::flash('danger', 'Quiz submitted successfully. Your score is: ' . $score . 
                '% Please revisit the training material an take the quiz again');
        }

       //Redirects to quizzes page
       return redirect('/quizzes');
    }
}
