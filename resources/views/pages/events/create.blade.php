@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Create Event</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/events') }}">
						{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('event-title') ? ' has-error' : '' }}">
                            <label for="event-title" class="col-md-4 control-label">Event Title</label>
                            <div class="col-md-6">
                                <input id="event-title" type="text" class="form-control" name="event-title" value="{{ old('event-title') }}" required autofocus>

                                @if ($errors->has('event-title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event-title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						
						<div class="form-group{{ $errors->has('start-date') ? ' has-error' : '' }}">
                            <label for="start-date" class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                                <div class='input-group datepicker'  data-provide="datepicker">
                                    <input id="start-date" name="start-date" class="form-control" value="{{ old('start-date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" style="cursor:pointer"></span>
                                    </span>
                                </div>
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
                                <div class='input-group datepicker'  data-provide="datepicker">
                                    <input id="end-date" name="end-date" class="form-control" value="{{ old('end-date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" style="cursor:pointer"></span>
                                    </span>
                                </div>
                                @if ($errors->has('end-date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end-date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('event-description') ? ' has-error' : '' }}">
                            <label for="event-description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="6" name="event-description" value="{{ old('event-description') }}"></textarea>

                                @if ($errors->has('event-description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event-description') }}</strong>
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
