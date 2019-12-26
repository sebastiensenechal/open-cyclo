@extends('template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')


@section('contenu')
    <section id="post-content">

        <header id="header-content">
            <h1>{{ $post->titre }}</h1>
						<em>{{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!} @if(Auth::check() and Auth::user()->admin)
							<span><a href="{{ route('posts.edit', $post->id) }}">Modifier</a></span>@endif</em>
        </header>

        <article class="content">
            <p>{{ $post->contenu }}</p>
        </article>

				
    </section>
@endsection
