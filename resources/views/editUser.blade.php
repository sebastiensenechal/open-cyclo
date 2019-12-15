@extends('template')

@section('titre')
		Modification d'un utilisateur
@endsection

@section('sous-titre')
		<p>Loem ipsum</p>
@endsection

@section('contenu')

<section id="content">
  <header id="header-content">
    <h2>Modification d'un utilisateur</h2>
  </header>

			{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
			  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
			  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
			  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('admin', 1, null) !!}Administrateur
					</label>
				</div>
			</div>
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
			{!! Form::close() !!}


		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>

</section>

@endsection
