<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
 *Program: Event controller class
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
use App\Event;
use Carbon\Carbon;
use DB;

class EventController extends Controller
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
     * Display a listing of the resource. Index view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets all event for initial view
        $events = Event::all();
        //Returns index view with available events
        return view('pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Returns  create event view
        return view('pages.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validates the event fields
        $this->validate($request, [
            'event-title' => 'string|required|max:255|min:2',
            'start-date' =>'string|required',
            'end-date' =>'string|required',
            'event-description' =>'required|string'
        ]);

        //Saves the event in database after validation
        $event = Event::create([
            'created_by' => Auth::user()->user_name,
            'title' => $request['event-title'],
            'description' => $request['event-description'],
            'start' => Carbon::parse($request['start-date']),
            'end' => Carbon::parse($request['end-date']),
        ]);

        //Success message sent to view after storing
        Session::flash('success', 'Event created successfully!');

        //Redirects to home page
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find an event in database
         $event = Event::find($id);

        //Returns edit event view with event data
        return view('pages.events.edit')
            ->with('event', $event);
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
        //Finds an event in database
        $event = Event::find($id);

        //Validates the event fields
        $this->validate($request, [
            'event_title' => 'string|required|max:255|min:2',
            'event_description' =>'required|string'
        ]);

        //Populates the event object
        $event->title = $request->event_title;
        $event->description = $request->event_description;

        //saves the data in database
        $event->save();
        //Success message sent to view after update
        Session::flash('success', 'Event updated successfully!');
        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Finds an event
        $event = Event::find($id);
        
        //Deletes an event
        $event->delete();

        Session::flash('success', 'Event deleted successfully!');
        return redirect('/events');
    }
}
