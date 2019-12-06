<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{ Html::style('../resources/css/style.css') }}
        <!--[if lt IE 9]>
    			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    		<![endif]-->
    </head>
    <body id="home">


        <header>
          <h1>Opencyclo</h1>
        </header>



        <main>
          <div id="map">
            <section id="map-infos">
              <h2>Informations</h2>
              <article>
                <!-- Contenu -->
              </article>
            </section>

            <!-- API cartographique -->
          </div>
        </main>



        <footer>
          <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
          </ul>
        </footer>


    </body>
</html>
