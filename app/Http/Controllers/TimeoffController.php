<?php
/**
 *Author: Pedro Santana Minalla

 *Date: 23/09/2016
 *Program: Time off controller
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Validator;
use Redirect;
use Session;
use App\User;
use Carbon\Carbon;
use DB;

class TimeoffController extends Controller
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
        try{
            //Gets time off records
            $timeoffRequests = DB::table('timeoff')
                                ->join('employees', 'employees.user_id', '=', 'timeoff.user_id')
                                ->select('timeoff.*', 'employees.name', 'employees.last_name')
                                ->get();

            //Returns time off index view with time off records
            return view('pages.timeoff.index')
                ->with('timeoffRequests', $timeoffRequests);
        }catch(Exception $e){
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
        //Returns request time off view
        return view('pages.timeoff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the time off request fields
        $this->validate($request, [
            'timeoff-title' => 'string|required|max:255|min:2',
            'start-date' =>'string|required',
            'end-date' =>'string|required',
            'description' =>'required|string'
        ]);

        //Stores record in database after validation
        DB::table('timeoff')->insert(
                ['user_id' => Auth::user()->id, 
                'title' => $request['timeoff-title'],
                'description' => $request['description'],
                'start' => Carbon::parse($request['start-date']),
                'end' => Carbon::parse($request['end-date']),
                'approve_denied_by' => Null,
                'status' => 'Pending'
            ]);

        //Success message after insert
        Session::flash('success', 'Time off request sent successfully!');
        return redirect('/shifts');
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
     * Declines a timeoff request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny($id)
    {
        //Denies a time off requests
        DB::table('timeoff')
            ->where('id', $id)
            ->update(['status' => 'Denied',
                    'approve_denied_by' => Auth::user()->user_name
            ]);

        //Success message after request is set to denied in database
        Session::flash('success', 'Time off request denied successfully!');

        //Redirects to time off page
        return redirect('/timeoff');
    }

    /**
     * Approve the specified Request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        //Proves an request in database
        DB::table('timeoff')
            ->where('id', $id)
            ->update(['status' => 'Approved',
                    'approve_denied_by' => Auth::user()->user_name
            ]);

        //Success message after setting request to approved in database
        Session::flash('success', 'Time off request approved successfully!');

        //Redirects to time off page
        return redirect('/timeoff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Removes a time off request record in database
        DB::table('timeoff')
            ->where('id', $id)
            ->delete();

        //Success message after deleting
        Session::flash('success', 'Time off request deleted successfully!');

        //Redirects to time off page
        return redirect('/timeoff');
    }
}
