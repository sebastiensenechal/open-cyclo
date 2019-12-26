@extends('layouts.app')

@section('titre')
		Modifier le profil
@endsection

@section('content')

<section class="container">
  <header id="header-content">
    <h2>Modifier le profil</h2>
  </header>

			{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
			  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom', 'required']) !!}
			  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
			  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('admin', 1, null) !!}Administrateur
					</label>
				</div>
			</div>
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}


			{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
				{!! Form::submit('Supprimer', ['class' => 'btn btn-primary', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
			{!! Form::close() !!}

		<p><a href="javascript:history.back()" class="btn btn-primary">Retour</a></p>

</section>

@endsection
