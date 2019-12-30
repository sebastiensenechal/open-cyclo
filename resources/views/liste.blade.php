@extends('template')

@section('titre')
		Infos cyclo
@endsection

@section('sous-titre')
		<p>Restez informé avec nos newsletters, guides pratique et recommandations.<br />
    <a class="button is-info" href="{{ route('posts.create') }}">Créer un article</a></p>
@endsection


@section('contenu')

		<section>
				<header id="header-content">
					<h2>En savoir, toujours plus</h2>

					@if(session()->has('info'))
					    <div class="notification is-success">
					        {{ session('info') }}
					    </div>
					@endif
				</header>


	      @foreach($posts as $post)
						<article>
			      	<h3>{{ $post->titre }}</h3>
							{{ $post->excerpt }}
								<ul class="list-meta">
									<li><a href="{{ route('posts.show', $post->id) }}">Voir</a></li>
									@if(Auth::check() and Auth::user()->admin)
										<li><a href="{{ route('posts.edit', $post->id) }}">Modifier</a></li>
										<li>
											{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
													{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-inline ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
												{!! Form::close() !!}
										</li>
									@endif
								</ul>
						</article>
	      @endforeach

				<footer class="pagination">
					{{ $posts->links() }}
				</footer>
		</section>


@endsection
