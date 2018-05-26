@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-lg-8 col-md-8">
                        @if(Session::has('success'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                              <strong>Success!</strong> {{ session('success') }}
                            </div>
                        @endif
                        <h3 class="text-info">Events Calendar</h3>
                        <hr>
                        <div>
                            @if(Auth::check() && Auth::user()->user_role == 1)
                            <a href="events/create">
                                <button type="button" class="btn btn-primary" title="Create Event">
                                    <span class="glyphicon glyphicon-plus"></span> Create 
                                </button>
                            </a>
                            @endif
                            <a href="{{ url('/events') }}" >
                                <button class="btn btn-primary" title="View All Events">
                                    <span class="glyphicon glyphicon-eye-open"></span> View All 
                                </button>
                            </a>
                        </div>
                        <div id='calendar' class="top-buffer"></div>

                        
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-info">Messages</h3>
                        <hr>
                        <a href="{{ url('messages/create') }}" title="Compose">
                            <button type="button" class="btn btn-primary">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Compose
                            </button>
                        </a>
                        <a href="{{ url('/messages') }}">
                            <button type="button" class="btn btn-primary" title="View All Messages">
                              <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View all
                            </button>
                        </a>
                        <div class="table-responsive top-buffer">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>New Messages</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if(count($messages))
                                    @foreach($messages as $message)
                                    <tr>
                                      <td>
                                        <a href="{{url('/messages/'.$message->id)}}">{{$message->message_title}}
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                      <td><p class="text-info">No new messages found</p></td>
                                    </tr>
                                    @endif
                                  </tbody>
                                </table>
                            </div>
                            <h3 class="text-info">Shared Files</h3>
                            <hr>
                            <a href="{{ url('file/share') }}" title="Share File">
                                <button type="button" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Share
                                </button>
                            </a>
                            <a href="{{ url('/sharefiles') }}">
                                <button type="button" class="btn btn-primary" title="View All Shared Files">
                                  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View all
                                </button>
                            </a>
                            <table class="table table-striped table-bordered top-buffer">
                                  <thead>
                                    <tr class="bg-primary">
                                      <th>Shared Files</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if(count($myShareFiles))
                                        @foreach($myShareFiles as $sharedFile)
                                        <tr>
                                          <td>
                                            <a href="{{ url($sharedFile->file) }}" download>
                                              {{$sharedFile->file_name}}
                                              <span class="glyphicon glyphicon-open-file"></span>
                                            </a>
                                        </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                          <td><p class="text-info">No new shared files found.</p></td>
                                        </tr>
                                    @endif
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
