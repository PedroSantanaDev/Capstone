<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Session;
use Response;

class UserController extends Controller
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
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function view()
    {
        //Returns view profile page
        return view('pages.user.user_profile');
    }
    /**
     * Updates profile
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //Finds the user record in database
        $user = User::find($id);

      //Valites the data
        $this->validate($request, [
            'name' => 'required|max:255',
            'user_name' => 'required|min:4|unique:users,user_name,'.$id,
            'email'=>'required|email|unique:users,email,'.$id
        ]);

        //Builds up object
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->security_question = $request->security_question;

        //Updates the user in database
        $user->save();

        //Success message after updating
        Session::flash('success', 'Profile updated successfully!');

        //Redirects to home page
        return redirect('/home');
    }

    /**
     * Gets user names for autocomplate
     *
     * @param  Request  $request
     * @return Response
     */
    public function getData(Request $request)
    {
        try{
            //Search query to the database
            $termn = $request->termn;
            $data = User::where('user_name', 'LIKE', '%'.$termn.'%')
                ->take(10)
                ->get();
            //Results array
            $results = array();

            //Populates the results array with the matching records from search
            foreach ($data as $key => $value)
            {
                $results[]=['id' => $value->id, 'value' => $value->user_name];
            }

            //Returns json object
            return Response::json($results);
        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}