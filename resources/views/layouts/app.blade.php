<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Backoffice</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_backoffice.css') }}" rel="stylesheet">
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
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
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
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
    <!-- <script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="//unpkg.com/vue2-leaflet"></script> -->
    @stack('scripts')
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
</body>
</html>
