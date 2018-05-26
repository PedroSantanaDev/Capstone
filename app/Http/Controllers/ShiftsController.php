<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Shifts controller
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Session;
use App\Shift;
use Carbon\Carbon;
use DB;

class ShiftsController extends Controller
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
     * Loads index view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            //gets all shifts
            $shifts = Shift::all();


            //Gets the shifts assigned to the logged in user
            $myShifts = DB::table('assigned_shifts')
                        ->select('assigned_shifts.*')
                        ->where('assigned_shifts.employee_user_id', '=', Auth::user()->id )
                        ->get();

            //Gets all assigned shifts
            $allAssignedShifts = DB::table('assigned_shifts')
                                ->join('employees', 'user_id', '=', 'employee_user_id')
                                ->select('assigned_shifts.*', 'employees.name', 'employees.last_name')
                                ->get();

            //gets time off request for the logged in user
            $myTimeoffRequets = DB::table('timeoff')
                                ->select('timeoff.*')
                                ->where('timeoff.user_id', '=', Auth::user()->id)
                                ->get();

            //Returns view with shifts records  and time off request          
            return view('pages.shifts.index')
                    ->with('shifts', $shifts)
                    ->with('myShifts', $myShifts)
                    ->with('allAssignedShifts', $allAssignedShifts)
                    ->with('myTimeoffRequets', $myTimeoffRequets);
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
        //returns
        return view('pages.shifts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the shift fields
        $this->validate($request, [
            'shift_title' => 'string|required|max:255|min:2',
            'start_date' =>'string|required',
            'end_date' =>'string|required',
            'shift_description' =>'required|string'
        ]);

        //Saves the shift in database after validation
        $shift = Shift::create([
            'created_by' => Auth::user()->user_name,
            'title' => $request['shift_title'],
            'description' => $request['shift_description'],
            'start' => Carbon::parse($request['start_date']),
            'end' => Carbon::parse($request['end_date']),
        ]);

        //Success message after creating a shift
        Session::flash('success', 'Shift created successfully!');

        //Redirects to shifts page
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

    }
    /**
     * Show the form for editting a resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Finds a shift
        $shift = Shift::find($id);

        //Returns edit shift view with selected shift
        return view('pages.shifts.edit', compact('shift'));
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
        //Finds a shift
         $shift = Shift::find($id);

        //Validates the event fields
        $this->validate($request, [
            'shift_title' => 'string|required|max:255|min:2',
            'shift_description' =>'required|string'
        ]);
        //Builds up object
        $shift->title = $request->shift_title;
        $shift->description = $request->shift_description;

        //Saves the data to the database
        $shift->save();

        //Success message after updating
        Session::flash('success', 'Shift updated successfully!');

        //Redirects to shifts page
        return redirect('/shifts');
    }

    /**
     * Display the assign shifts page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {
        //Finds a shift
        $shift = Shift::find($id);

        //Returns assign shift page with selected shift
        return view('pages.shifts.assign')
                ->with('shift', $shift);
    }
    /**
     * Assigns a shift
     *
     * @return \Illuminate\Http\Response
     */
    public function assignSave(Request $request)
    {
        //gets the user id of the user the shift will be assign to
        $userID = DB::table('users')
                    ->select('id')
                    ->where('user_name', '=', $request->assign_to)
                    ->get();

        //Validates the shift fields
        $this->validate($request, [
            'shift_title' => 'string|required|max:255|min:2',
            'start_date' =>'string|required',
            'end-date' =>'string|required',
            'shift_description' =>'required|string',
            'assign_to' => 'string|required|max:255|min:2',
        ]);

        if (count($userID)) {

            //Insert the record into database after validation
            DB::table('assigned_shifts')->insert([
                'employee_user_id' => $userID[0]->id,
                'assigned_by' => Auth::user()->user_name,
                'title' => $request['shift_title'],
                'description' => $request['shift_description'],
                'start' => $request['start_date'],
                'end' =>$request['end-date'],
            ]);

            //Success message after shift is assigned
            Session::flash('success', 'Shift assigned successfully!');

            //Redirects to shifts page
            return redirect('/shifts');
        }else{
            Session::flash('danger', 'Invalid username. Please enter a valid username.');
            return redirect('/shifts');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Finds a shift
        $shift = Shift::find($id);

        //Deletes the shift
        $shift->delete();

        //Success message after deleting
        Session::flash('success', 'Shift deleted successfully!');

        //Redirects to shifts page
        return redirect('/shifts');
    }
}
