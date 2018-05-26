@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Assign shift</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/shifts/assign/save') }}">
						{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('shift-title') ? ' has-error' : '' }}">
                            <label for="shift-title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="shift-title" type="text" class="form-control" name="shift_title" value="{{ $shift->title}}" autofocus>

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
                                <textarea class="form-control" rows="4"  name="shift_description" >{{ $shift->description }}</textarea>
                                @if ($errors->has('shift-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift-description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start-date') ? ' has-error' : '' }}">
                            <label for="start-date" class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                                <input id="start-date" name="start_date" class="form-control" value="{{ $shift->start }}" autofocus>
                                @if ($errors->has('start-date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start-date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end-date') ? ' has-error' : '' }}">
                            <label for="end-date" class="col-md-4 control-label">End Date</label>
                            <div class="col-md-6">
                                    <input id="end-date" name="end-date" class="form-control" value="{{ $shift->end }}" autofocus>
                                @if ($errors->has('end-date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end-date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('assign_to') ? ' has-error' : '' }}">
                            <label for="assign_to" class="col-md-4 control-label">Assign to</label>
                            <div class="col-md-6" id="the-basics">
                                <input id="assigned_to" type="text" placeholder="username" class="form-control searchUsername" name="assign_to" value="{{ old('send_to') }}" autofocus>
                                <input type="hidden" id="route-url" value="{{ url('/usernames') }}">
                                @if ($errors->has('assign_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('assign_to') }}</strong>
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
