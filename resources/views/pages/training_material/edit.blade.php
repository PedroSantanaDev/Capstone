@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Training File</div>

                <div class="panel-body">
                    <div class="col-lg-8">
                        <form role="form" method="POST" action="{{ url('/training_material/update/'. $file->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="fileName">File Name</label>
                                <input type="text" name="file_name" class="form-control" id="uploadTrainingFile" value="{{ $file->file_name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" rows="10" cols="10" name="description">{{ $file->description }}</textarea>
                            </div>
                          <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ URL::previous() }}">
                                <button type="button" class="btn btn-danger">Cancel</button>
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

