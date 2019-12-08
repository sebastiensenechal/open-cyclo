<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Open Cyclo | @yield('titre')</title>
    {{ Html::style('../public/css/style.css') }}
    {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
    <!--[if lt IE 9]>
			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
</head>
<body>
  <header>
    <h1 id="title-site">@yield('titre')</h1>

    <nav id="nav">
      <ul>
        <li><a class="active" href="{{ route('home') }}">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="{{ url('contact') }}">Contact</a></li>
        <li><a href="aide">Aide</a></li>
      </ul>
    </nav>

  </header>

  <main>
  	@yield('contenu')
  </main>

  <footer>
    @yield('footer')
  </footer>
</body>
</html>
