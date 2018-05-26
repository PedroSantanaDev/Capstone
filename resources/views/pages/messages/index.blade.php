@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Messages</div>

                <div class="panel-body">
                    <div class="col-lg-12">
                      @if(Session::has('success'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                      @endif
                        <div class="table-responsive">
                                <table id="messagesTable" class="table table-hover table-striped table-bordered">
                                  <legend class="text-info">All Messages</legend>
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>Sent by</th>
                                      <th>Title</th>
                                      <th>Sent date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                      <td >{{$message->sent_by}}</td>
                                      <td><a href="{{url('/messages/'.$message->id)}}">{{$message->message_title}}</a></td>
                                      <td>{{$message->created_at}}</td>
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
<footer class="footer">
  @include('layouts.footer')
</footer>
@endsection

