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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    {{ Html::style('../public/css/style.css') }}
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
    @yield('styles')
</head>
<body id="container-home">
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
