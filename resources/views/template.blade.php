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

  <div id="page-container">

    <header id="header">
      <div id="left">
        <nav id="nav">
          <ul>
            <li><a class="active" href="{{ route('map') }}">Carte</a></li>
            <li><a href="{{ route('home') }}">Log</a></li>
            <li><a href="{{ url('contact') }}">Contact</a></li>
            <li><a href="aide">Aide</a></li>
          </ul>
        </nav>

        <div>
          <h1 id="title-site">@yield('titre')</h1>
        </div>

        <i class="material-icons md-cyan md-36">arrow_downward</i>
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

</body>
</html>
