@extends('template')

@section('titre')
		Création d'un utilisateur
@endsection

@section('sous-titre')
		<p>Loem ipsum</p>
@endsection

@section('contenu')

<section id="content">
  <header id="header-content">
    <h2>Création d'un utilisateur</h2>
  </header>

			{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom', 'required']) !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe'], 'required') !!}
				{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe', 'required']) !!}
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('admin', 1, null) !!} Administrateur
					</label>
				</div>
			</div>
			{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}

		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>

</secton>

@endsection
