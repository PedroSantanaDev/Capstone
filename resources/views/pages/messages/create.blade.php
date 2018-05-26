@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Compose Message</div>
                <div class="panel-body">
                    @if(Session::has('danger'))
                        <div class="alert alert-danger" id="danger-alert">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                          <strong>Oh snap!</strong> {{ session('danger') }}
                        </div>
                      @endif
                	<h3 class="text-info">New Message</h3>
                	<hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/messages') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('send_to') ? ' has-error' : '' }}">
                            <label for="send_to" class="col-md-2 control-label">Send To:</label>
                            <div class="col-md-8" id="the-basics">
                                <input id="send_to" type="text" placeholder="username" class="form-control searchUsername" name="send_to" value="{{ old('send_to') }}" autofocus>
                                <input type="hidden" id="route-url" value="{{ url('/usernames') }}">
                                @if ($errors->has('send_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('send_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message_title') ? ' has-error' : '' }}">
                            <label for="message_title" class="col-md-2 control-label">Title:</label>
                            <div class="col-md-8">
                                <input id="message_title" type="text" placeholder="e.g Meeting" class="form-control" name="message_title" value="{{ old('message_title') }}" autofocus>

                                @if ($errors->has('message_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-2 control-label">Message:</label>
                            <div class="col-md-8">
                                <textarea id="message" type="text" rows="10" cols="60" class="form-control" name="message"  autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
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

