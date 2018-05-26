<?php
/**
 *Author: Pedro Santana Minalla

 *Date: 23/09/2016
 *Program: Training Meterial Controller
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
use App\TrainingMaterial;
use Carbon\Carbon;
use DB;

class TrainingMaterialController extends Controller
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
     *Loads  the training material view
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Finds all training material files
        $training_materials = TrainingMaterial::all();

        //Loads index page with training material records
        return view('pages.training_material.index', compact('training_materials'));
    }
    /**
    *Loads upload training file view
    *@return Upload training material view
    */
    public function upload()
    {
        //Returns upload training material view
        return view('pages.training_material.upload'); 
    }

    /**
    *Load edit training material view
    *@return edit view with selected file data loaded
    */
    public function edit($id)
    {
        //Finds a training file in database
        $file = TrainingMaterial::find($id);

        //Returns edit file with selected file data
        return view('pages.training_material.edit')
            ->with('file', $file);
    }
    /**
    *Updates a file
    *@return training material view
    */
    public function update($id, Request $request)
    {
        //Finds a training file in database
        $file = TrainingMaterial::find($id);

        //Valites the data
        $this->validate($request, [
            'file_name' => 'required|max:255',
            'description' => 'required|min:10',
        ]);
        //Builds up object
        $file->file_name = $request->file_name;
        $file->description = $request->description;

        //Stores data in database
        $file->save();

        //Success message after updating
        Session::flash('success', 'File updated successfully!');

        //Redirects to training material page
        return redirect('/training_material');

    }
    /**
    *Deletes a file from the system
    *@return training material view
    */
    public function delete($id){
         //Finds a training file in database
        $file = TrainingMaterial::find($id);

        //Deletes the file
        $file->delete();

        //Success message after deleting
        Session::flash('success', 'File deleted successfully!');

        //Redirecti to training material page
        return redirect('/training_material');
    }

    /**
    *Validates and upload training files
    *@return training material view
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

        //Storaga destination
        $destinationPath ='storage/public/uploads/';

        //moves the file to local storage
        $file->move($destinationPath, $file_original_name);

        //Inserts the file attributes and link to the file into the database
        $template_file = TrainingMaterial::Create([
            'file_name' => $request['file_name'],
            'description' => $request['description'],
            'file' => $destinationPath . $file_original_name,
            'user_id' => Auth::user()->id,
            'uploaded_by' => Auth::user()->user_name,
            'upload_date' => date("Y-m-d H:i:s"),
        ]);

        //Success message after saving
        Session::flash('success', 'File saved successfully!');

        //Redictes to training material page
        return redirect('training_material');
    }   
}
