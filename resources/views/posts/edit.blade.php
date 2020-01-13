@extends('layouts.template')

@section('titre')
		Modifier un article
@endsection

@section('contenu')
	<section>
    <header class="card-header">
          <h2>Renseignez les champs ci-dessous</h2>

					<ul class="list-meta">
						<li>
							<a href="{{ url('posts') }}">Retour à la liste des articles</a>
						</li>
					</ul>
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
                      <label class="label">Extrait</label>
                      <div class="control">
                          <textarea class="textarea" name="excerpt" placeholder="Extrait" required>{{ old('excerpt', $post->excerpt) }}</textarea>
                      </div>
                      @error('excerpt')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div>

									<div class="field">
                      <label class="label">Article</label>
                      <div class="control">
                          <textarea class="textarea" id="content" name="contenu" rows="25" placeholder="Article" required>{{ old('contenu', $post->contenu) }}</textarea>
                      </div>
                      @error('contenu')
                          <p class="help is-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="field">
                      <div class="control">
                        {!! Form::submit('Envoyer !') !!}
                      </div>
                  </div>


              </form>
          </div>
      </div>

	</section>
@endsection
