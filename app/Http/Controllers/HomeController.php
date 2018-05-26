<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Home controller class
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
use App\SharedFile;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        //Gets the logged in user messages
            $messages = Message::where('user_id', Auth::user()->id)
                        ->where('status', 0)
                        ->get();

            //Gets the logged in user share files
            $myShareFiles = SharedFile::where('user_id', Auth::user()->id)
                        //->where('status', 0)
                        ->get();

            //Returns home page with share files and messages
            return view('pages.home')
                ->with('myShareFiles', $myShareFiles)
                ->with('messages', $messages);
            }catch(Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
    }
}
