<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Open Cyclo @yield('titre')</title>
    {{ Html::style('../resources/css/style.css') }}
    <!--[if lt IE 9]>
			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
</head>
<body>
  <header>
    @yield('header')
  </header>

  <main>
  	@yield('contenu')
  </main>

  <footer>
    @yield('footer')
  </footer>
</body>
</html>
