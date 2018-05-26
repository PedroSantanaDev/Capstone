@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Template Files</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                      @if(Auth::check() && Auth::user()->user_role == 1)
                        <div class="col-lg-8 -col-md-8 col-sm-8 col-xs-12">
                            <a href="{{ url('template_files/upload') }}">
                                <button type="button" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-cloud-upload"></span> Upload file
                                </button>
                            </a> 
                        </div>
                      @endif 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="templateFilesTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                  <legend class="text-info">All Template Files</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>File Name</th>
                                      <th>Description</th>
                                      <th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
                                      @if(Auth::check() && Auth::user()->user_role == 1)
                                        <th>Action</th>
                                      @endif
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($template_files as $file)
                                    <tr>
                                      <td >{{$file->file_name}}</td>
                                      <td>{{$file->description}}</td>
                                      <td><a href="{{ url($file->file) }}" download>{{$file->file_name}}</a></td>
                                      @if(Auth::check() && Auth::user()->user_role == 1)
                                      <td>
                                        <a href="{{ url('template_file/edit/'. $file->id) }}" title="Edit">
                                          <button type="button" class="btn btn-default btn-sm btn-block">
                                              <span class="glyphicon glyphicon-pencil" ></span> Edit
                                            </button>
                                        </a>
                                        <form method="POST" action="{{url('template_file/delete/'. $file->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-block btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Template File" data-message="Are you sure you want to delete this file ?">
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
</div>
<footer class="footer">
  @include('layouts.footer')
</footer>
@include('layouts.delete_confirm')
@endsection

