@extends('layouts.app')

@section('content')

<section class="base-page">

  <header>
      <nav id="breadcrumb" aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
              <li class="breadcrumb-item"><a href="{{ url('user') }}">Liste des membres</a></li>
              <li class="breadcrumb-item" aria-current="page">Modifier le profil</li>
          </ol>
      </nav>

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
			@if (Auth::user()->admin === 1)
			<div class="form-group">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('admin', 1, null) !!}Administrateur
					</label>
				</div>
			</div>
			@endif
				{!! Form::submit('Envoyer', ['class' => 'btn']) !!}
			{!! Form::close() !!}

		<p><a href="javascript:history.back()">Annuler</a></p>

</section>

@endsection
