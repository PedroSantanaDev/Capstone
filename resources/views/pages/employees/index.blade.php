@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Employees</div>
                <div class="panel-body">
                    <div class="col-lg-12 -col-md-12 col-sm-12 col-xs-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                       <a href="{{url('employee/add')}}">
                        <button type="button" class="btn btn-primary">
                          <span class="glyphicon glyphicon-plus"></span> Add Employee
                        </button>
                        </a> 
                        <a href="{{url('/timeoff')}}">
                        <button type="button" class="btn btn-primary" title="View Time off Request">
                          <span class="glyphicon glyphicon-eye-open"></span> Time off Request
                        </button>
                        </a>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                           <legend class="text-info">All Employees</legend>
                            <table id="employeeTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr class="bg-primary">
                                  <th>#</th>
                                  <th>F. Name</th>
                                  <th>L. Name</th>
                                  <th>City</th>
                                  <th>Zip Code</th>
                                  <th>Street</th>
                                  <th>Province</th>
                                  <th>Title</th>
                                  <th>Email</th>
                                  <th>Home Phone#</th>
                                  <th>Cell Phone#</th>
                                  <th id="editDelete">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employees as $employee)
                                  <tr>
                                    <th scope="row">{{$employee->employee_no}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->city}}</td>
                                    <td>{{$employee->postal_code}}</td>
                                    <td>{{$employee->street}}</td>
                                    <td>{{$employee->province}}</td>
                                    <td>{{$employee->title}}</td>
                                    <td><a href="mailto:{{$employee->email}}">{{$employee->email}}</a></td>
                                    <td>{{$employee->home_phone_no}}</td>
                                    <td>{{$employee->cellphone_no}}</td>
                                    <td>
                                      <a href="{{ url('employee/edit/'. $employee->id) }}" title="Edit" >
                                        <button type="button" class="btn btn-default btn-sm btn-block">
                                              <span class="glyphicon glyphicon-pencil" ></span> Edit
                                            </button>
                                      </a>
                                      
                                      <form method="POST" action="{{url('employee/delete/'. $employee->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-block btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Employee" data-message="Are you sure you want to delete this employee ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
                                      
                                    </td> 
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

