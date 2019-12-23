@extends('template')

@section('titre')
		Ajouter un article
@endsection

@section('contenu')
	<section>
    <header class="card-header">
          <p class="card-header-title">Modification d'un article</p>
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
                        <button class="button is-link">Envoyer</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>

	</section>
@endsection
