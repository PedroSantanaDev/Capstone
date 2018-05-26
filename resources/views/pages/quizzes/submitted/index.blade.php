@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Submitted Quizzes</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="templateFilesTable" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                  <legend class="text-info">Submitted Quizzes</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>Title</th>
                                      <th>Submitted by</th>
                                      <th>Score</th>
                                      @if(Auth::check() && Auth::user()->user_role == 1)
                                        <th>Action</th>
                                      @endif
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($quizzes as $quiz)
                                    <tr>
                                      <td >{{$quiz->title}}</td>
                                      <td>{{$quiz->name}} {{$quiz->last_name}}</td>
                                      <td>{{$quiz->score}}%</td>
                                      @if(Auth::check() && Auth::user()->user_role == 1)
                                      <td>
                                        <form method="POST" action="{{url('quizzes/submitted/delete/'. $quiz->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-block btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Subtmitted Quiz" data-message="Are you sure you want to delete submission ?">
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