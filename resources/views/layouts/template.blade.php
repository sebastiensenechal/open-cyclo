<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Open Cyclo | @yield('titre')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style('css/style.css') }}
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
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
                            <li><a class="active" href="{{ route('map') }}">Carte</a></li>
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
            <li><a href="mention-lagel">Mentions légales</a></li>
            <li><a href="rgpd">Données personnelles</a></li>
            <li><a href="accessibilite">Accessibilité</a></li>
          </ul>
        </nav>
      </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    {{ Html::script('js/script.js') }}
</body>
</html>
