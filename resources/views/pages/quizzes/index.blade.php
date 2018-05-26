@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Quizzes</div>
                <div class="panel-body">
                    <div class="col-lg-12">
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
                        <div class="col-lg-8 -col-md-8 col-sm-8 col-xs-12">
                            <a href="{{ url('quiz/create') }}">
                                <button type="button" class="btn btn-primary" title="Create Quiz">
                                  <span class="glyphicon glyphicon-plus"></span> Create 
                                </button>
                            </a> 
                            <a href="{{ url('quizzes/submitted') }}">
                                <button type="button" class="btn btn-success" title="Submitted Quizzes">
                                  <span class="glyphicon glyphicon-eye-open"></span> Submitted Quizzes 
                                </button>
                            </a> 
                        </div>
                      @endif 
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="tableQuizzes" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                  <legend class="text-info">All Quizzes</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($quizzes as $quiz)
                                    <tr>
                                      <td >{{$quiz->title}}</td>
                                      <td>{{$quiz->description}}</td>
                                      
                                      <td>
                                      	<a href="{{ url('quiz/take/'.$quiz->id) }}">
                                      		<button type="button" class="btn btn-primary btn-sm">Take quiz</button>
                                      	</a>

                                      	@if(Auth::check() && Auth::user()->user_role == 1)
	                                        <a href="{{ url('quiz/edit/'. $quiz->id) }}" title="Edit">
	                                        	<button type="button" class="btn btn-default btn-sm">
	                                        		<span class="glyphicon glyphicon-pencil" ></span> Edit
	                                        	</button>
	                                        </a>
                                          <form method="POST" action="{{url('quiz/delete/'. $quiz->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm  btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Quiz" data-message="Are you sure you want to delete this quiz ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                          </form>
                                        @endif
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
</div>
<footer class="footer">
  @include('layouts.footer')
</footer>
@include('layouts.delete_confirm')
@endsection