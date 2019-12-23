@extends('template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')
    <a class="button is-info" href="{{ route('posts.create') }}">Créer un article</a>
@endsection


@section('contenu')

@if(session()->has('info'))
    <div class="notification is-success">
        {{ session('info') }}
    </div>
@endif


      <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><strong>{{ $post->titre }}</strong></td>
                                <td><a class="button is-primary" href="{{ route('posts.show', $post->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('posts.edit', $post->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
																				@if(Auth::check() and Auth::user()->admin)
												      						{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
												      							{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
												      						{!! Form::close() !!}
												      					@endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{ $posts->links() }}
@endsection
