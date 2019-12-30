@extends('template')

@section('titre')
		Nos articles
@endsection

@section('sous-titre')


@section('contenu')
    <section id="post-content">

        <header id="header-content">
            <h1>{{ $post->titre }}</h1>
						<p>{{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}</p>

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

        <article class="content">
            {!! $post->contenu !!}
        </article>


    </section>
@endsection