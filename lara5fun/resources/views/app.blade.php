<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hello Laravel 5</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{ elixir('output/final.css') }}">
</head>
<body>
	<div class="container">
		
		@include('partials.flash')
		@yield('content')
	</div>

	@yield('footer')
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
</body>
</html>