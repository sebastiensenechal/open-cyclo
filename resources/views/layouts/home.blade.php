<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Backoffice</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- General style -->
    {{ Html::style('css/style.css') }}
    <!-- Fontawesome -->
    <link href="{{ asset('sass/app.scss') }}" rel="stylesheet">
    {{ Html::style('css/fontawesome/css/all.css') }}
    <!-- Material icons -->
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
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
    <!-- <script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="//unpkg.com/vue2-leaflet"></script> -->
    @stack('scripts')
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
</body>
</html>
