<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<title>Open Cyclo | @yield('titre')</title>

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

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		{{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
		{{ Html::style('https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap') }}
		{{ Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap') }}

		<!-- General style -->
		{{ Html::style('css/style.css') }}

		<!--[if lt IE 9]>
		{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
		{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
	</head>


	<body>
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

		<div id="page-container">

			<header id="header">
				<div id="left">
					<nav id="nav">
						<ul>
							<li class="deroulant"><span class="label_menu">Menu</span>
								<ul class="sous">
									<li><a class="active" href="{{ route('map') }}">Open Cyclo</a></li>
									<li><a href="{{ url('posts') }}">Infos cyclo</a></li>
									<li><a href="{{ url('aide') }}">Aide</a></li>
									<li><a href="{{ url('contact') }}">Contact</a></li>
								</ul>
							</li>
						</ul>
					</nav>

					<div>
						<h1 id="title-site">@yield('titre')</h1>
						<div class="arrow"><span class="material-icons md-cyan md-36">arrow_downward</span></div>
					</div>

				</div>

				<div id='right'>
					@yield('sous-titre')
				</div>
			</header>

			<main>
				@yield('contenu')
			</main>

			<footer>
				@yield('footer')
				<nav id="legal">
					<ul>
						<li><a href="{{ url('mention-legal') }}">Mentions légales</a></li>
						<li><a href="{{ url('rgpd') }}">Données personnelles</a></li>
						<li><a href="{{ url('accessibilite') }}">Accessibilité</a></li>
					</ul>
				</nav>
			</footer>

		</div>

		<!-- Scripts -->
		<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
		<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
		@stack('scripts')
	</body>
</html>
