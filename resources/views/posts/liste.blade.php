@extends('layouts.template')

@section('titre')
		Infos cyclo et<br />
		actualités
@endsection

@section('sous-titre')
		<p>Vous saurez tout sur le cyclo.<br />
			Guides pratiques, recommandations, anecdotes...<br />
			C'est par ici !</p>
@endsection


@section('contenu')

		<section id="posts-list">
				<header id="header-content">
					<nav id="breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
									<li class="breadcrumb-item" aria-current="page">Infos cyclo</li>
							</ol>
					</nav>

					<h2>En savoir, toujours plus</h2>
					@if(Auth::check() and Auth::user()->admin)
						@can('create', new App\Flag)
				    		<p><a href="{{ route('posts.create') }}">Créer un article</a></p>
						@endcan
					@endif

					@if(session()->has('info'))
					    <div class="notification is-success">
					        {{ session('info') }}
					    </div>
					@endif
				</header>


	      @foreach($posts as $post)
						<article class="post">
			      	<h3><a href="{{ route('posts.show', $post->id) }}#post-container">{{ $post->titre }}</a></h3>
							<p class="meta-data">{!! $post->created_at->format('d-m-Y') !!}</p>
							<p>{{ $post->excerpt }}</p>
								<ul class="list-meta">
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
