@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Create shift</div>
                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/shifts/store') }}">
						{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('shift_title') ? ' has-error' : '' }}">
                            <label for="shift-title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="shift-title" type="text" class="form-control" name="shift_title" value="{{ old('shift_title') }}" autofocus>

                                @if ($errors->has('shift_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shift_description') ? ' has-error' : '' }}">
                            <label for="shift-description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="4"  name="shift_description" >{{ old('shift_description') }}</textarea>
                                @if ($errors->has('shift_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                                <div class='input-group datepicker'  data-provide="datepicker">
                                    <input id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="end_date" class="col-md-4 control-label">End Date</label>
                            <div class="col-md-6">
                                <div class='input-group datepicker'  data-provide="datepicker">
                                    <input id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
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
