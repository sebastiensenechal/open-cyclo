@extends('template')

@section('titre')
		Ajouter un article
@endsection

@section('contenu')
	<section>
    <header class="card-header">
          <p class="card-header-title">Modifier un article</p>
      </header>
      <div class="card-content">
          <div class="content">
              <form action="{{ route('posts.update', $post->id) }}" method="POST">
                  @csrf
                  @method('put')
                  <div class="field">
                      <label class="label">Titre</label>
                      <div class="control">
                        <input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre', $post->titre) }}" placeholder="Titre de l'article">
                      </div>
                      @error('titre')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="field">
                      <label class="label">Article</label>
                      <div class="control">
                          <textarea class="textarea" name="contenu" placeholder="Article" required>{{ old('contenu', $post->contenu) }}</textarea>
                      </div>
                      @error('contenu')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="field">
                      <div class="control">
                        {!! Form::submit('Envoyer !') !!}

												@if(Auth::check() and Auth::user()->admin)
													{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
														{!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
													{!! Form::close() !!}
												@endif
                      </div>
                  </div>
              </form>
          </div>
      </div>

	</section>
@endsection
