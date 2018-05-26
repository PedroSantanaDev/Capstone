@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Edit shift</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/shifts/update/'.$shift->id) }}">
						{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('shift-title') ? ' has-error' : '' }}">
                            <label for="shift-title" class="col-md-4 control-label">Shift Title</label>
                            <div class="col-md-6">
                                <input id="shift-title" type="text" class="form-control" name="shift_title" value="{{ $shift->title }}" required autofocus>

                                @if ($errors->has('shift-title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift-title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shift-description') ? ' has-error' : '' }}">
                            <label for="shift-description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="6" name="shift_description">{{$shift->description}}</textarea>

                                @if ($errors->has('shift-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift-description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6  col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <a href="{{ URL::previous() }}">
                                    <button type="button" class="btn btn-danger">
                                        Cancel
                                    </button>
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
