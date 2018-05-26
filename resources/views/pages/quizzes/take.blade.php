@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Take Quiz</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                    	<legend class="col-form-legend">{{$quiz->title}}</legend>	
                    	<form Method="POST" class="col-lg-12" action="{{url('quiz/submit/'.$quiz->id)}}">
                    		{{ csrf_field() }}

                    		<?php $count = 0; ?>
                    		@foreach($quizQA as $QA)
                    		<div role="group" class="form-group">
						    	<h4>{{$count + 1}}) {{$QA->question}}</h4>
						        <div class="col-md-12" >
						        	<label>
									   A) <input type="radio" name="option{{$count}}" value="{{$QA->wrong_answer_1}}">
									    {{$QA->wrong_answer_1}}
								    </label>
						        </div>
						   
						        <div class="col-md-12">
						        	<label>
									   B) <input type="radio" name="option{{$count}}" value="{{$QA->wrong_answer_2}}">
									    {{$QA->wrong_answer_2}}
								    </label>
						        </div>
						   
						        <div class="col-md-12">
						        	<label>
									   C) <input type="radio" name="option{{$count}}" value="{{$QA->correct_answer}}">
									    {{$QA->correct_answer}}
								    </label>
						        </div>
						  
						        <div class="col-md-12">
						        	<label>
									   D) <input class="form-check-input" name="option{{$count}}" type="radio"  value="{{$QA->wrong_answer_3}}">
									    {{$QA->wrong_answer_3}}
								    </label>
						        </div>
							</div>
							<?php $count++; ?>
						    @endforeach		
						    <input type="hidden" value="{{$count}}" name="count">			    
						    <div class="form-group">
						      <button type="submit" class="btn btn-primary">Submit</button>
						      <a href="{{url('/quizzes')}}">
						        <button type="button" class="btn btn-danger">Cancel</button>
						      </a>
						    </div>
						  </form>
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