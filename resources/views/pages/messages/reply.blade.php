@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Message</div>

                <div class="panel-body">
                    <div class="col-lg-12">
                    	<form role="form" method="POST" action="{{ url('/messages') }}">
                            {{ csrf_field() }}                            

                            <div class="form-group{{ $errors->has('send_to') ? ' has-error' : '' }}">
	                            <label for="send_to" class="control-label">Reply To</label>
	                            <div id="the-basics">
	                                <input id="send_to" type="text" class="form-control autocomplete" name="send_to" value="{{ $message->sent_by  }}" required>

	                                @if ($errors->has('send_to'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('send_to') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>


                            <div class="form-group{{ $errors->has('message_title') ? ' has-error' : '' }}">
                            	<label for="message_title" class="control-label">Title</label>
	                            <div>
	                                <input id="message_title" type="text" value="{{$message->message_title}}" class="form-control" name="message_title"  required >

	                                @if ($errors->has('message_title'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('message_title') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
                        	</div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            	<label for="message" class="control-label">Message</label>
	                            <div>
	                                <textarea id="message" type="text" rows="10" cols="60" class="form-control" name="message" autofocus="autofocus">&#013;&#010;-------------------------------------------------------------------------------------------------------------
	                                	{{$message->message}}</textarea>

	                                @if ($errors->has('message'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('message') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
                        	</div>

                           
                            <button class="btn btn-primary" type="submit">Reply</button>
                           
                            <a href="{{url('messages/reply/'. $message->id)}}" title="Cancel">
                                <button class="btn btn-danger" type="submit">Cancel</button>
                            </a>
                        </form>
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
@endsection