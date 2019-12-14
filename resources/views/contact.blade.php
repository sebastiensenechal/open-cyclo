@extends('template')

@section('titre')
		Nous contacter
@endsection

@section('sous-titre')
		<p>Sous-titre</p>
@endsection

@section('contenu')

	<section class="form-center">
		<header id="header-content">
			<h2>Nous sommes à votre écoute</h2>

			<p>&laquo;&nbsp;Pédagogie&nbsp;&raquo;, voilà un mot qui revet un sens particulier chez OpenCyclo.<br />
			Nous mettons un point d'honneur à informer et à fournir des guides, pour un cyclisme en toute sécurité.<br />
			<a href="email#header-content">Inscrivez-vous à notre newsletters</a></p>
		</header>

		{!! Form::open(['url' => 'contact']) !!}
			<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
				{!! Form::label('name', 'Nom', array('class' => 'hidden')); !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
				{!! Form::label('email', 'Email', array('class' => 'hidden')); !!}
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
				{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
				{!! Form::label('mess', 'Message', array('class' => 'hidden')); !!}
				{!! Form::textarea ('mess', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
				{!! $errors->first('mess', '<small class="help-block">:message</small>') !!}
			</div>
			{!! Form::submit('Envoyer !') !!}
		{!! Form::close() !!}
	</section>

@endsection
