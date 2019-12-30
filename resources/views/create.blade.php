@extends('template')

@section('titre')
		Ajouter un article
@endsection

@section('contenu')
	<section>
			<header class="card-header">
					<p class="card-header-title">Création d'un article</p>
			</header>
        <!-- <div class="card-content">
            <div class="content">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Titre</label>
                        <div class="control">
                          <input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre') }}" placeholder="Titre du film">
                        </div>
                        @error('titre')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
										<div class="field">
	                      <label class="label">Article</label>
	                      <div class="control">
	                          <textarea class="textarea" name="contenu" placeholder="Article">{{ old('contenu') }}</textarea>
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
        </div> -->

				<div class="card">
	<div class="card-content">
			<div class="content">
					<form action="{{ route('posts.store') }}" method="POST">
							@csrf
							<div class="field">
									<label class="label">Titre</label>
									<div class="control">
										<input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre') }}" placeholder="Titre">
									</div>
									@error('titre')
											<p class="help is-danger">{{ $message }}</p>
									@enderror
							</div>

							<div class="field">
									<label class="label">Extrait</label>
									<div class="control">
											<textarea class="textarea" name="excerpt" placeholder="Extrait"></textarea>
									</div>
									@error('excerpt')
											<p class="help is-danger">{{ $message }}</p>
									@enderror
							</div>

							<div class="field">
									<label class="label">Article</label>
									<div class="control">
											<textarea class="textarea" id="content" rows="25" name="contenu" placeholder="Article"></textarea>
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
</div>


							<!-- {!! Form::open(['route' => 'posts.store', 'class' => 'form-horizontal panel']) !!}
									@csrf
									<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
										{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre', 'required']) !!}
										{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
									</div>
									<div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
										{!! Form::label('contenu', 'Article', array('class' => 'hidden')); !!}
										{!! Form::textarea ('contenu', null, ['class' => 'form-control', 'required']) !!}
										{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
									</div>
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!} -->

	</section>
@endsection
