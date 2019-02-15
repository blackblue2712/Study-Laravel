<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blade Template</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

	@include('pages.header')
	<div class="content">
		<h1>COURSE</h1>
		@yield('content')	
	</div>
	@include('pages.footer')
	
</body>
</html>