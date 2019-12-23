@extends('template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')


@section('contenu')
    <div class="card">
        <header class="card-header">
            <h1 class="card-header-title">{{ $post->titre }}</h1>
        </header>
        <div class="card-content">
            <div class="content">
                <p>{{ $post->contenu }}</p>

                @if(Auth::check() and Auth::user()->admin)
      						{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
      							{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
      						{!! Form::close() !!}
      					@endif
      					<em class="pull-right">
      						<span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}
      					</em>
            </div>
        </div>
    </div>
@endsection
