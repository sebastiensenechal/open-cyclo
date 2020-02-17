<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name') }} | Backoffice</title>

		<meta name="description" content="La carte des pistes cyclables dans le monde. Un couteau suisse, un guide tout-terrain destiné aux cyclistes."/>
	    <meta name="author" content="Sébastien Sénéchal">
	    <meta name="twitter:card" content="summary" />
	    <meta name="twitter:site" content="Open Cyclo" />
	    <meta name="twitter:creator" content="Sébastien Sénéchal" />
	    <meta property="og:url" content="https://opencyclo.sebastiensenechal.com/" />
	    <meta property="og:title" content="Open Cyclo" />
	    <meta property="og:description" content="La carte des pistes cyclables dans le monde. Un couteau suisse, un guide tout-terrain destiné aux cyclistes." />
	    <meta property="og:image" content="https://opencyclo.sebastiensenechal.com/img/abstract.jpg" />
	    <meta property="og:type" content="website" />
		<link rel="icon" type="image/ico" href="https://sebastiensenechal.com/favicon.ico" />

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		{{ Html::style('https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap') }}
		{{ Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap') }}
		{{ Html::style('css/fontawesome/css/all.css') }}
		{{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}

		<!-- Bootstrap style -->
		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

		<!-- General style -->
		{{ Html::style('css/style.css') }}
		@yield('styles')
	</head>

	<body id="container-home">
		<nav id="nav-connexion">
			<ul>
				@guest
					<li>
						<a href="{{ route('login') }}">{{ __('Connexion') }}</a>
					</li>
				@if (Route::has('register'))
					<li>
						<a href="{{ route('register') }}">{{ __('Abonnement') }}</a>
					</li>
				@endif
				@else
					<li><a href="{{ route('home') }}">Tableau de bord</a></li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Déconnection') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				@endguest
			</ul>
		</nav>

		<div id="app">
			<header>
				@yield('nav')
			</header>

			<main>
				@yield('content')
			</main>

			<footer>
				@yield('footer')
			</footer>
		</div>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		@stack('scripts')
		<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
	</body>
</html>
