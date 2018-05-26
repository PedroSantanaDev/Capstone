<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Template Files controller
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
use App\TemplateFile;
use Carbon\Carbon;
use DB;

class TemplateFilesController extends Controller
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
        //Gets all template files
        $template_files = TemplateFile::all();

        //Returns index view with all template files
        return view('pages.template_files.index', compact('template_files'));
    }

    /**
     * Loads edit file with with selected file
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Finds a template file
        $file = TemplateFile::find($id);

        //Returns edit template file view with selected file
        return view('pages.template_files.edit')
            ->with('file', $file);

    }
    /**
     * Updates a file
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //Finds a file
        $file = TemplateFile::find($id);

        //Valites the data
        $this->validate($request, [
            'file_name' => 'required|max:255',
            'description' => 'required|min:10',
        ]);

        //Builds object
        $file->file_name = $request->file_name;
        $file->description = $request->description;

        //Updates the file in database
        $file->save();

        //Success message after updating
        Session::flash('success', 'File updated successfully!');

        //redirects to template files page
        return redirect('/template_files');
    }

    /**
     *Loads upload view
     *
     *@return \Illuminate\Http\Response
     */
    public function upload()
    {
        //Returns upload file view
        return view('pages.template_files.upload');   
    }

    /**
    *Validates and save the file
    */
    public function save(Request $request)
    {
        //Valites the data
        $this->validate($request, [
            'file_name' => 'required|max:255',
            'description' => 'required|min:10',
            'file' => 'required',
        ]);

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

        //File name
        $file_original_name = $file->getClientOriginalName();

        //File extension
        $extension = $file->getClientOriginalExtension();

        //Destination in local storage
        $destinationPath ='storage/public/uploads/';

        //Moves the file to the store location
        $file->move($destinationPath, $file_original_name);

        //Inserts the file attributes and link to the file into the database
        $template_file = TemplateFile::Create([
            'file_name' => $request['file_name'],
            'description' => $request['description'],
            'file' => $destinationPath . $file_original_name,
            'uploaded_by' => Auth::user()->user_name,
            'upload_date' => date("Y-m-d H:i:s"),
        ]); 

        //Success message after saving
        Session::flash('success', 'File created successfully!');

        //Redirect to template files
        return redirect('template_files');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a message
        $file = TemplateFile::find($id);

        //Deletes a file
        $file->delete();

        //Success message after deleting
        Session::flash('success', 'File deleted successfully!');

        //Redirects to template files
        return redirect('/template_files');
    }
}
