@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Events</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                        <div class="table-responsive">
                           <legend class="text-info">All Events</legend>
                            <table id="eventTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Created By</th>
                                  @if(Auth::check() && Auth::user()->user_role == 1)
                                  <th id="editDelete">Action</th>
                                  @endif
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($events as $event)
                                  <tr>
                                    <th scope="row">{{$event->title}}</th>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->start}}</td>
                                    <td>{{$event->end}}</td>
                                    <td>{{$event->created_by}}</td>
                                    @if(Auth::check() && Auth::user()->user_role == 1)
                                      <td>
                                        <a href="{{ url('events/'. $event->id) }}" title="Edit">
                                          <button type="button" class="btn btn-default btn-sm btn-block">
                                              <span class="glyphicon glyphicon-pencil" ></span> Edit
                                            </button>
                                        </a>
                                        <form method="POST" action="{{url('events/delete/'. $event->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Event" data-message="Are you sure you want to delete this event ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                          </form>
                                      </td>
                                    @endif 
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
  @include('layouts.footer')
</footer>
@include('layouts.delete_confirm')
@endsection
