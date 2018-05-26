<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: SubmittedQuiz Controller
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Session;
use App\Quiz;
use DB;
use App\User;

class SubmittedQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            //Gets the quizzes submitted
            $quizzes = DB::table('submitted_quizzes')
                        ->join('employees', 'employees.user_id', '=', 'submitted_quizzes.user_id')
                        ->select('employees.name', 'employees.last_name','submitted_quizzes.*')
                        ->get();
            //Returns view with submitted quizzes
            return view('pages.quizzes.submitted.index')
                    ->with('quizzes', $quizzes);
        }catch(Exception $e)
        {
           echo 'Caught exception: ',  $e->getMessage(), "\n"; 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deletes a submission
        DB::table('submitted_quizzes')
            ->where('id',  $id)
            ->delete();

        Session::flash('success', 'Submitted quiz deleted successfully!');
        return redirect('/quizzes/submitted');
    }
}
