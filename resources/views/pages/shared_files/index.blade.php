@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Shared Files</div>
                <div class="panel-body">
                  	@if(Session::has('success'))
                    	<div class="alert alert-success" id="success-alert">
                      		<button type="button" class="close" data-dismiss="alert">x</button>
                      		<strong>Success!</strong> {{ session('success') }}
                    	</div>
                  	@endif

                    @if(Auth::check() && Auth::user()->user_role == 0)
                      <div class="col-lg-12">
                      	<div class="table-responsive">
                                <table id="trainingMaterialTable" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
                                  <legend class="text-info">My Shared Files</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>File Name</th>
                                      <th>Description</th>
                                      <th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($myShareFiles as $myFile)
                                    <tr>
                                      <td >{{$myFile->file_name}}</td>
                                      <td>{{$myFile->description}}</td>
                                      <td>
                                        <a href="{{ url($myFile->file) }}" download>
                                          {{$myFile->file_name}}
                                        </a>
                                      </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                      </div>
                    @endif
                    @if(Auth::check() && Auth::user()->user_role == 1)
                    <div class="col-lg-12">
                    	<div class="col-lg-12">
                      	<div class="table-responsive">
                                <table id="trainingMaterialTable" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
                                  <legend class="text-info">My Shared Files</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>File Name</th>
                                      <th>Description</th>
                                      <th>Share With</th>
                                      <th>Share By</th>
                                      <th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
                                       <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($allSharedFiles as $sharedFiles)
                                    <tr>
                                      <td >{{$sharedFiles->file_name}}</td>
                                      <td>{{$sharedFiles->description}}</td>
                                      <td>{{$sharedFiles->shared_with}}</td>
                                      <td>{{$sharedFiles->shared_by}}</td>
                                      <td>
                                        <a href="{{ url($sharedFiles->file) }}" download>
                                          {{$sharedFiles->file_name}}
                                        </a>
                                      </td>
                                      <td>
                                          <a href="{{ url('sharefiles/edit/'. $sharedFiles->id) }}" title="Edit">
                                            <button type="button" class="btn btn-default btn-sm">
                                              <span class="glyphicon glyphicon-pencil" ></span> Edit
                                            </button>
                                          </a>

                                          <form method="POST" action="{{url('sharefiles/delete/'. $sharedFiles->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Training File" data-message="Are you sure you want to delete this file ?">
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