@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Edit Quiz</div>
                <div class="panel-body">
                	<h3 class="text-info">Edit Quiz</h3>
                	<hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/quiz/update/'.$quiz->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('quiz-title') ? ' has-error' : '' }}">
                            <label for="quiz-title" class="col-md-2 control-label">Title</label>
                            <div class="col-md-8" id="the-basics">
                           
                                <input id="quiz-title" type="text" class="form-control" value="{{$quiz->title}}" name="quiz-title" required autofocus>

                                @if ($errors->has('quiz-title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quiz-title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quiz-description') ? ' has-error' : '' }}">
                            <label for="quiz-description" class="col-md-2 control-label">Description</label>
                            <div class="col-md-8" id="the-basics">
                           
                                <textarea id="quiz-description" type="text" class="form-control" name="quiz-description" required autofocus>{{$quiz->description}}</textarea>

                                @if ($errors->has('quiz-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quiz-description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                        	<div class="col-md-8 col-md-offset-2">
                        		<button type="submit" class="btn btn-success">Submit</button>
                        		<a href="{{url('/home')}}">
                        			<button type="button" class="btn btn-danger">Cancel</button>
                        		</a>
                        	</div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
  @include('layouts.footer')
</footer>
@endsection