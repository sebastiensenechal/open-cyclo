@extends('layouts.template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')
		<p>&nbsp;&laquo;La seule voie qui offre quelque espoir d'un avenir meilleur pour toute l'humanité est celle de la coopération et du partenariat.&nbsp;&raquo; - Kofi Annan</p>
@endsection

@section('contenu')

	<section class="form-center">
		<header id="header-content">
				<nav id="breadcrumb" aria-label="breadcrumb">
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
								<li class="breadcrumb-item" aria-current="page">Nous contacter</li>
						</ol>
				</nav>
				
				<h2>Nous sommes à votre écoute</h2>

				<p>&laquo;&nbsp;Pédagogie&nbsp;&raquo;, voilà un mot qui revet un sens particulier chez OpenCyclo.<br />
				Nous mettons un point d'honneur à informer et à fournir des guides, pour un cyclisme en toute sécurité.<br />
				<a href="email#header-content">Inscrivez-vous à notre newsletters</a></p>
		</header>

		{!! Form::open(['url' => 'contact']) !!}
				<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
					{!! Form::label('name', 'Nom', array('class' => 'hidden')); !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Votre nom', 'required']) !!}
					{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
				</div>
				<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
					{!! Form::label('email', 'Email', array('class' => 'hidden')); !!}
					{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email'], 'required') !!}
					{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
				</div>
				<div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
					{!! Form::label('mess', 'Message', array('class' => 'hidden')); !!}
					{!! Form::textarea ('mess', null, ['class' => 'form-control', 'placeholder' => 'Votre message', 'required']) !!}
					{!! $errors->first('mess', '<small class="help-block">:message</small>') !!}
				</div>
				{!! Form::submit('Envoyer !') !!}
		{!! Form::close() !!}
	</section>

@endsection
