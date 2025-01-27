<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		
		<title>CyberSport App</title>

		@if (str_contains(Route::current()->parameters['any'] ?? '', 'admin'))
			<link rel="stylesheet" href="/css/style-admin.min.css">
		@endif
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">
		<link rel="stylesheet" href="/vendor/emojione/sprites/emojione-sprite-{{ config('emojione.spriteSize') }}.min.css"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-grid.min.css">
		<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-reboot.min.css">-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-utilities.min.css">

		<script>
			window.arrUser = {{ Illuminate\Support\Js::from($arrUser ?? null) }};
			window.accessToken = {{ Illuminate\Support\Js::from($accessToken ?? null) }};
		</script>
	</head>
	<body class="dark">
		<div id="app"></div>
		<script src="{{ mix('js/app.js') }}"></script>
	</body>
</html>
