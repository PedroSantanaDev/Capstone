@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Shifts</div>
                <div class="panel-body">
                  @if(Session::has('success'))
                    <div class="alert alert-success" id="success-alert">
                      <button type="button" class="close" data-dismiss="alert">x</button>
                      <strong>Success!</strong> {{ session('success') }}
                    </div>
                  @endif
                  @if(Session::has('danger'))
                        <div class="alert alert-danger" id="danger-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Oh snap!</strong> {{ session('danger') }}
                        </div>
                      @endif
                    @if(Auth::check() && Auth::user()->user_role == 1)
                    <div class="col-lg-12"> 
                        <a href="{{url('/shifts/create')}}">
                        <button type="button" class="btn btn-primary" title="Create Shift">
                          <span class="glyphicon glyphicon-plus"></span> Create 
                        </button>
                        </a>
                    </div>
                    @endif


                    @if(Auth::check() && Auth::user()->user_role == 0)
                      <div class="col-lg-12">
                        

                        <div class="table-responsive">
                           <legend class="text-info">My shifts</legend>
                            <table id="shiftTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Assigned By</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($myShifts as $aShift)
                                  <tr>
                                    <th scope="row">{{$aShift->title}}</th>
                                    <td>{{$aShift->description}}</td>
                                    <td>{{$aShift->start}}</td>
                                    <td>{{$aShift->end}}</td>
                                    <td>{{$aShift->assigned_by}}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>

                        <a href="{{url('/timeoff/create')}}">
                          <button type="button" class="btn btn-primary" title="Request Time Off">
                            <span class="glyphicon glyphicon-plus"></span> Request Time Off
                          </button>
                        </a>
                        <div class="table-responsive">
                           <legend class="text-info">My Time Off Request</legend>
                            <table id="myTimeoffRequest" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Reason</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($myTimeoffRequets as $request)
                                  <tr>
                                    <th scope="row">{{$request->title}}</th>
                                    <td>{{$request->description}}</td>
                                    <td>{{$request->start}}</td>
                                    <td>{{$request->end}}</td>
                                    <td>{{$request->status}}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="table-responsive">
                           <legend class="text-info">All other shifts</legend>
                            <table id="othersShiftTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Assigned By</th>
                                  <th>Assigned To</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($allAssignedShifts as $assigned)
                                  <tr>
                                    <th scope="row">{{$assigned->title}}</th>
                                    <td>{{$assigned->description}}</td>
                                    <td>{{$assigned->start}}</td>
                                    <td>{{$assigned->end}}</td>
                                    <td>{{$assigned->assigned_by}}</td>
                                    <td>{{$assigned->name}} {{$assigned->last_name}}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    
                    @if(Auth::check() && Auth::user()->user_role == 1)
                    <div class="col-lg-12">
                        <div class="table-responsive">
                           <legend class="text-info">All shifts</legend>
                            <table id="shiftTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                @foreach($shifts as $shift)
                                  <tr>
                                    <th scope="row">{{$shift->title}}</th>
                                    <td>{{$shift->description}}</td>
                                    <td>{{$shift->start}}</td>
                                    <td>{{$shift->end}}</td>
                                    <td>{{$shift->created_by}}</td>
                                    @if(Auth::check() && Auth::user()->user_role == 1)
                                      <td>
                                        <a href="{{ url('shifts/assign/'. $shift->id) }}">
                                          <button type="button" class="btn btn-primary btn-sm btn-block" title="Assign Shift">
                                              <span class="glyphicon glyphicon-plus" ></span> Assign
                                            </button>
                                        </a>
                                        <a href="{{ url('shifts/edit/'. $shift->id) }}" title="Edit">
                                          <button type="button" class="btn btn-default btn-sm btn-block">
                                              <span class="glyphicon glyphicon-pencil" ></span> Edit
                                            </button>
                                        </a>
                                        <form method="POST" action="{{url('shifts/delete/'. $shift->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-block btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Shift" data-message="Are you sure you want to delete this shift ?">
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
                        <div class="table-responsive">
                           <legend class="text-info">Assigned shifts</legend>
                            <table id="othersShiftTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Assigned By</th>
                                  <th>Assigned To</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($allAssignedShifts as $assigned)
                                  <tr>
                                    <th scope="row">{{$assigned->title}}</th>
                                    <td>{{$assigned->description}}</td>
                                    <td>{{$assigned->start}}</td>
                                    <td>{{$assigned->end}}</td>
                                    <td>{{$assigned->assigned_by}}</td>
                                    <td>{{$assigned->name}} {{$assigned->last_name}}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
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

