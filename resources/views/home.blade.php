<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{ Html::style('../resources/css/style.css') }}
        {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
        <!--[if lt IE 9]>
    			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    		<![endif]-->
    </head>
    <body id="home">

        <header>
          <h1 id="title_site">Opencyclo</h1>
          <nav id="nav">
            <ul>
              <li><a class="active" href="{{ route('home') }}">Home</a></li>
              <li><a href="#news">News</a></li>
              <li><a href="{{ url('contact') }}">Contact</a></li>
              <li><a href="#help">Help</a></li>
            </ul>
          </nav>

          <nav id="toolbar">
            <ul>
              <li><a href="#"><i class="material-icons">location_searching</i></a></li>
              <li><a href="#"><i class="material-icons">comment</i></a></li>
              <li><a href="#"><i class="material-icons">help_outline</i></a></li>
              <li><a href="#"><i class="material-icons">person</i></a></li>
            </ul>
          </nav>
        </header>



        <main>
          <!-- <section id="map-infos">
            <h2>Informations</h2>
            <article>
            </article>
          </section> -->
          <div id="map">
            <!-- API cartographique -->
          </div>
        </main>



        <footer>

        </footer>


    </body>
</html>
