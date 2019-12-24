@extends('template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')
    <a class="button is-info" href="{{ route('posts.create') }}">Créer un article</a>
@endsection


@section('contenu')

		<section>
				<header id="header-content">
					<h2>Nos actualités</h2>

					@if(session()->has('info'))
					    <div class="notification is-success">
					        {{ session('info') }}
					    </div>
					@endif
				</header>


	      @foreach($posts as $post)
						<article>
			      	<h3>{{ $post->titre }}</h3>

								<ul class="list-meta">
									<li><a href="{{ route('posts.show', $post->id) }}">Voir</a></li>
									<li><a href="{{ route('posts.edit', $post->id) }}">Modifier</a></li>
								</ul>
						</article>
	      @endforeach

				<footer class="pagination">
					{{ $posts->links() }}
				</footer>
		</section>


@endsection
