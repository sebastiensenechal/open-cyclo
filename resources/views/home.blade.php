<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{ Html::style('../public/css/style.css') }}
        {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
        <!--[if lt IE 9]>
    			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    		<![endif]-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    </head>
    <body id="home">

        <header>
          <h1 id="title-home">Opencyclo</h1>
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
          <div id ="status"></div>
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
          <nav id="toolbar">
            <ul>
              <li id="find-me"><i class="material-icons">location_searching</i></li>
              <li><a href="#"><i class="material-icons">comment</i></a></li>
              <li><a href="aide"><i class="material-icons">help_outline</i></a></li>
              <li><a href="user"><i class="material-icons">person</i></a></li>
            </ul>
          </nav>
        </footer>

        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
        {{ Html::script('../public/js/map.js') }}
        <script>Maps.initMap();</script>
    </body>
</html>
