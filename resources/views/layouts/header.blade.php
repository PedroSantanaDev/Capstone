<!--
Header links for signed in users
 -->
 @if (!Auth::guest())

	<li><a  href="{{ url('home') }}">Home</a></li>
	@if(Auth::check() && Auth::user()->user_role == 1)
		<li><a  href="{{ url('employees') }}">Employees</a></li>
	@endif
	<li><a  href="{{ url('training_material') }}">Training Material</a></li>
	<li><a  href="{{ url('template_files') }}">Template Files</a></li>
	<li><a  href="{{ url('shifts') }}">Shifts</a></li>
	<li><a  href="{{ url('quizzes') }}">Quizzes</a></li>

@endif