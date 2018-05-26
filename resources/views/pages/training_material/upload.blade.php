@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8  col-sm-12 col-xs-12 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Training Material</div>

                <div class="panel-body">
                    <div class="col-lg-8">
                        <form role="form" method="POST" action="{{ url('/upload_training_file/save') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('file_name') ? ' has-error' : '' }}">
                                <label for="fileName">File Name</label>
                                <input type="text" name="file_name" class="form-control" id="uploadTrainingFile" placeholder="File Name">
                            
                                @if ($errors->has('file_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" rows="3" name="description"></textarea>
                                 @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                          <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file">File</label>
                            <input type="file" id="trainingFile" name="file">

                            @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ URL::previous() }}">
                                <button type="reset" class="btn btn-danger">Cancel</button>
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