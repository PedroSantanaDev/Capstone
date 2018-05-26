@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Message</div>

                <div class="panel-body">
                    <div class="col-lg-12">                             
                            <div class="form-group">
                                <label for="fileName">Send by</label>
                                <input type="text" name="sent_by" class="form-control"  value="{{ $message->sent_by }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control"name="message_title" value="{{ $message->message_title }}">
                            </div>

                             <div class="form-group">
                                <label for="description">Message</label>
                                <textarea type="text" class="form-control" rows="10" cols="10" >{{ $message->message }}</textarea>
                            </div>
                            <a href="{{ url('/messages')}}" title="Back to Messages">
                              <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-arrow-left"></span> Messages
                              </button>
                            </a>
                            <a href="{{url('messages/read/'. $message->id)}}" title="Mark as read">
                                <button class="btn btn-success" type="button">Mark as read</button>
                            </a>
                            <a href="{{url('messages/reply/'. $message->id)}}" title="Reply">
                                <button class="btn btn-info" type="button">Reply</button>
                            </a>
                          	
                            <form method="POST" action="{{url('messages/delete/'. $message->id)}}" accept-charset="UTF-8" style="display:inline">
                                {{ csrf_field() }}
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Message" data-message="Are you sure you want to delete this message ?">
                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                </button>
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
@include('layouts.delete_confirm')
@endsection
