<!doctype html>
<html>
@include('layouts.head')
<body>

	<header>
		@include('layouts.header') 
	</header>
	<div class="container">
		<div class="row">
		  	<div class="col-lg-12 col-md-12 col-sm-12 -xs-12">
		   		@yield('content')
		    </div>
		</div>
	  <footer> @include('layouts.footer') </footer>
	</div>
</body>
</html>