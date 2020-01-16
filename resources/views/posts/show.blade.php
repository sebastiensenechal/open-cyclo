@extends('layouts.template')

@section('titre')
		Nos articles
@endsection

@section('sous-titre')

@endsection

@section('contenu')
    <section id="post-container">

        <header id="header-content">
						<nav id="breadcrumb" aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
										<li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Infos cyclo</a></li>
										<li class="breadcrumb-item" aria-current="page">{{ $post->titre }}</li>
								</ol>
						</nav>

            <h1>{{ $post->titre }}</h1>
						<p class="meta-data">{!! $post->created_at->format('d-m-Y') !!}</p>
						<!-- <p class="meta-data">{{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}</p> -->

						@if(Auth::check() and Auth::user()->admin)
						<ul class="list-meta">
							<li><span><a href="{{ route('posts.edit', $post->id) }}">Modifier</a></li>
							<li>{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
										{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-inline ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
									{!! Form::close() !!}
								</span></li>
						</ul>
						@endif

        </header>

        <article class="post-content">
            {!! $post->contenu !!}
        </article>


    </section>
@endsection
