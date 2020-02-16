<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }} | Backoffice</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	{{ Html::style('https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap') }}
	{{ Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap') }}
	{{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}

	<!-- Bootstrap style -->
	<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

	<!-- General style -->
	{{ Html::style('css/style_backoffice.css') }}
	@yield('styles')
</head>
<body id="app">
	<div id="page-container">
		<header id="main-header">
			<nav class="navbar">
				<h1><a href="{{ url('/') }}" title="Retour à l'accueil">
					{{ config('app.name') }}
				</a></h1>

				<!-- Left Side Of Navbar -->
				<ul>
					<li class="deroulant"><span class="label_menu">Menu</span>
						<ul class="sous">
							<li><a href="{{ route('home') }}">Tableau de bord</a></li>
							<!-- Authentication Links -->
							@guest
							<li>
								<a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
							</li>
							@if (Route::has('register'))
							<li>
								<a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
							</li>
							@endif
							@else
							<li>
								<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Déconnection') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
						@endguest
					</ul>
				</li>
			</ul>
		</nav>

		@yield('header')
	</header>

	<main>
		@yield('content')
	</main>

	<footer>
		<nav id="legal">
			<ul>
				<li><a href="mention-lagel">Mentions légales</a></li>
				<li><a href="rgpd">Données personnelles</a></li>
				<li><a href="accessibilite">Accessibilité</a></li>
			</ul>
		</nav>
	</footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
</body>
</html>
