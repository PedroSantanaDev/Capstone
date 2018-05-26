@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Timeoff Requests</div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                        <div class="table-responsive">
                           <legend class="text-info">Timeoff Requests</legend>
                            <table id="timeOffTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Reason</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Requested By</th>
                                  <th>Status</th>
                                  <th>Appr/denied By</th>
                                  @if(Auth::check() && Auth::user()->user_role == 1)
                                  <th id="editDelete">Action</th>
                                  @endif
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($timeoffRequests as $timeoff)
                                  <tr>
                                    <th scope="row">{{$timeoff->title}}</th>
                                    <td>{{$timeoff->description}}</td>
                                    <td>{{$timeoff->start}}</td>
                                    <td>{{$timeoff->end}}</td>
                                    <td>{{$timeoff->name}} {{$timeoff->last_name}}</td>
                                    <td>{{$timeoff->status}}</td>
                                    <td>{{$timeoff->approve_denied_by}}</td>
                                    @if(Auth::check() && Auth::user()->user_role == 1)
                                      <td>

                                      	 @if($timeoff->status == "Pending")
                                        <a href="{{ url('timeoff/approve/'. $timeoff->id) }}" >
                                          <button type="button" class="btn btn-primary btn-xs" title="Approve">
                                              <span class="glyphicon glyphicon-ok" ></span> Approve
                                            </button>
                                        </a>
                                        <a href="{{ url('timeoff/deny/'. $timeoff->id) }}">
                                          <button type="button" class="btn btn-default btn-xs" title="Decline">
                                              <span class="glyphicon glyphicon-remove" ></span> Deny
                                            </button>
                                        </a>
                                        @endif
                                        <form method="POST" action="{{url('timeoff/delete/'. $timeoff->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-xs  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Timeoff Request" data-message="Are you sure you want to delete this request ?">
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