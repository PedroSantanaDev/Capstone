<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Employee controller class
 *
*/
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;
use Session;
use App\User;
use Carbon\Carbon;

class EmployeesController extends Controller
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
     * Loads idex view with employees
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        try{
            $employees = Employee::getAll();
            return view('pages.employees.index',compact('employees'));
        }catch(Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
     
    /**
     * Create a new user instance after a valid registration.
     *Insert user personal data into the empoyee table
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        //Validates input fields
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'last_name' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'postal_code' => ['regex:/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/'], //Valid canadian postal code
            'home_phone_no' => ['regex:/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i'],
            'cellphone_no' => ['regex:/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i'],
            'employee_title' => 'required|max:255',
            'hire_date' => 'required|max:255',
            'security_question' => 'required|max:255',
            'security_question_answer' => 'required|max:255',
            'user_name' => 'required|min:6|unique:users',
            'user_role' => 'required|max:1',
        ]);

        //creates user after validation
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'user_name' => $request['user_name'],
            'user_role' => $request['user_role'],
            'security_question' => $request['security_question'],
            'security_question_answer' => bcrypt($request['security_question_answer']),
            'password' => bcrypt($request['password']),
        ]);

        //Creates employee after validation
        $employee = Employee::create([
            'name' => $request['name'],
            'user_id' => $user->id,
            'last_name' => $request['last_name'],
            'title' => $request['employee_title'],
            'employee_no' => $user->id,
            'email' => $user->email,
            'hire_date' => Carbon::parse($request['hire_date']),
            'birthdate' => Carbon::parse($request['birthdate']),
            'street' => $request['street'],
            'city' => $request['city'],
            'province' => $request['province'],
            'postal_code' => $request['postal_code'],
            'home_phone_no' => $request['home_phone_no'],
            'cellphone_no' => $request['cellphone_no'],
            'status' => 'active',
        ]);

        //Saves the user data
        $user->save();

        //Saves the employee data
        $employee->save(); 

        //Success message sent to view after update
        Session::flash('success', 'Employee added successfully!');  

        //Redirects to employees page    
         return redirect('/employees');
    }
    /**
     * Loads add employee view
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //Return add employee view
        return view('pages.employees.add');
    }

    /**
     * Loads edit employee view
     *
     * @return 
     */
    public function edit($id)
    {
        //Find an employee
        $employee = Employee::find($id);
        //Returns edit employee wiew with employee data
        return view('pages.employees.edit')
            ->with('employee', $employee);
    }
    /**
     * Updates an employee
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //Find an employee on database
        $employee = Employee::find($id);

        //Validates the employee data
        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'postal_code' => ['regex:/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/'],
            'home_phone_no' => ['regex:/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i'],
            'cellphone_no' => ['regex:/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i'],
            'employee_title' => 'required|max:255',
        ]);

        //Stores the data on the employee object
        $employee->name = $request->name;
        $employee->last_name = $request->last_name;
        $employee->street = $request->street;
        $employee->city = $request->city;
        $employee->province = $request->province;
        $employee->postal_code = $request->postal_code;
        $employee->home_phone_no = $request->home_phone_no;
        $employee->cellphone_no = $request->cellphone_no;
        $employee->title = $request->employee_title;

        //Saves the updated employee data
        $employee->save();

        //Success message sent to view after update
        Session::flash('success', 'Employee updated successfully!'); 

        //Redirects the admin to the employees page
        return redirect('/employees');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        //finds employee on database
        $employee = Employee::find($id);
        //Deletes the employee from database
        $employee->delete();

        //Success message sent to view after update
        Session::flash('success', 'Employee deleted successfully!'); 
        //Redirects the admin to the employees page
        return redirect('/employees');
    }
}
