<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') - KirKir</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

	@include ('components.navbar')

	<div class="heading">
		<h1>KirKir</h1>
	</div>

	@yield ('content')

	<script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
