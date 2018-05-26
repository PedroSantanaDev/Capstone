<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Message Controller
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
use App\Message;
use Carbon\Carbon;
use DB;

class MessageController extends Controller
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
            //Gets messages for the logged in user
            $messages = Message::where('user_id', Auth::user()->id)->get();

            //Returns messages index view with messages for the logged in user
            return view('pages.messages.index', compact('messages'));
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
        //Returns create message view
        return view('pages.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the input fields
        $this->validate($request, [
            'send_to' => 'string|required|max:255',
            'message_title' =>'string|required|max:255',
            'message' =>'required|string'
        ]);

        //Gets the user id for the message recipient
        $user_id = DB::table('users')->select('id')
                ->where('user_name',$request['send_to'])->get();
        $id; //to store the recipient id
        //Loop through the object return by the DB model
        if (count($user_id)) {
            foreach ($user_id as $key) 
            {
                $id = $key->id;
            }
            

            //Creates the message
             $message = Message::create([
                'sent_to' => $request['send_to'],
                'user_id' => $id,
                'message_title' => $request['message_title'],
                'message' => $request['message'],
                'sent_by' => Auth::user()->user_name,
                'status' => 0,
            ]);
            //Saves the message in database
            $message->save();
            //Success message after message has been saved
            Session::flash('success', 'Message sent successfully!');
            //Return to messages page
            return redirect('/messages');
        }else{
            Session::flash('danger', 'Invalid username. Please enter a valid username.');
            return redirect('/messages/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find a message in database
         $message = Message::find($id);
        //Returns messages view with the selected message
        return view('pages.messages.view')
            ->with('message', $message);    
    }

    /**
     * Show the form for replying to a message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        //Find a message in database
        $message = Message::find($id);

        //Returns reply to message view with the selected message
        return view('pages.messages.reply')
            ->with('message', $message);
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
     * Marks messate as read
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setRead($id)
    {
        //Finds a message in database
        $message = Message::find($id);

        //Sets the message status to 1 in database. 1 = User read the message
        $message->status = 1;

        //Saves the change
        $message->save();

        //Success message after marking as read
        Session::flash('success', 'Message marked read successfully!');

        //Returns to messages table
        return redirect('/messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a message in database
        $message = Message::find($id);

        //Deletes the message
        $message->delete();

        //Success message after deleting
        Session::flash('success', 'Message deleted successfully!');

        //Redirects to messages page
        return redirect('/messages');
    }
}
