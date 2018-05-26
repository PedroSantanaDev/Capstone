<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Share Files controller
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
use App\SharedFile;
use Carbon\Carbon;
use DB;

class SharedFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Finds all shared files for admin view
        $allSharedFiles = SharedFile::all();

        //Finds shared files for the logged in user
        $myShareFiles = SharedFile::where('user_id', Auth::user()->id)
                    //->where('status', 0)
                    ->get();

        //Returns index view with shared files
        return view('pages.shared_files.index')
            ->with('myShareFiles', $myShareFiles)
            ->with('allSharedFiles', $allSharedFiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Returns create view
        return view('pages.shared_files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Finds the id of the user the file is being shared with
        $userID = DB::table('users')
                    ->select('id')
                    ->where('user_name', '=', $request->share_with)
                    ->get();
       
        //Valites the data
        $this->validate($request, [
            'share_with' => 'required|max:255',
            'file_name' => 'required|max:255',
            'description' => 'required|min:10',
            'file' => 'required|file',
        ]);

        if (count($userID)) {

            /**
            *Valid data, now we save it.
            */
            if ($request->hasFile('file'))
            {
                //File is valid
                if ($request->file('file')->isValid())
                {
                    $file = $request->file('file');
                }
            }
            //Name of the file
            $file_original_name = $file->getClientOriginalName();

            //File Extension
            $extension = $file->getClientOriginalExtension();

            //Destination where we store the file
            $destinationPath ='storage/public/shared_files/';

            //Moves the file to the storage directory
            $file->move($destinationPath, $file_original_name);

            //Inserts the file attributes and link to  the database
            $shared = SharedFile::Create([
                'user_id' => $userID[0]->id,
                'file_name' => $request['file_name'],
                'description' => $request['description'],
                'file' => $destinationPath . $file_original_name,
                'shared_date' => date("Y-m-d H:i:s"),
                'shared_with' => $request['share_with'],
                'shared_by' => Auth::user()->user_name,
                
            ]); 
            //Success message after inserting
            Session::flash('success', 'File shared successfully!');

            //Redirects to share files page
            return redirect('sharefiles');
        }else{
            Session::flash('danger', 'Invalid username. Please enter a valid username.');
            return redirect('/file/share');
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
        //Finds an file for editing
        $file = SharedFile::find($id);

        //Returns edit share file view with selected file data
        return view('pages.shared_files.edit')
                ->with('file', $file);
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
        //Finds a file in database
        $file = SharedFile::find($id);

        //Validates inputs
        $this->validate($request, [
            'file_name' => 'required|max:255',
            'description' => 'required|min:10',
        ]);

        //Loads the file object
        $file->file_name = $request->file_name;
        $file->description = $request->description;

        //Saves the values in the object in the database
        $file->save();

        //Success message after updating
        Session::flash('success', 'File updated successfully!');

        //Redirect to share files page
        return redirect('sharefiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Finds a file in database
        $file = SharedFile::find($id);

        //Deletes the file from database
        $file->delete();

        //Success message after deleting
        Session::flash('success', 'File deleted successfully!');

        //Redirect to share files page
        return redirect('sharefiles');
    }
}
