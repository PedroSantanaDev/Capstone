@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Create Quiz</div>
                <div class="panel-body">
                	<h3 class="text-info">New Quiz</h3>
                	<hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/quiz/store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('quiz_title') ? ' has-error' : '' }}">
                            <label for="quiz_title" class="col-md-2 control-label">Title</label>
                            <div class="col-md-8" id="the-basics">
                                <input id="quiz_title" type="text" class="form-control" name="quiz_title" value="{{ old('quiz_title') }}" autofocus>

                                @if ($errors->has('quiz_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quiz_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea id="description" type="text" rows="5" cols="10" class="form-control" name="description" autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="questions"></div>
                        <div class="form-group">
                        	<div class="col-md-8 col-md-offset-2">
                        		<button type="button" class="btn btn-success" id="addQuestion">Add Question</button>
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