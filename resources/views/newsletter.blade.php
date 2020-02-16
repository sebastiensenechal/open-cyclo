@extends('layouts.template')

@section('titre')
	Inscription à la newsletter
@endsection

@section('contenu')

	<section class="form-center">
		<header id="header-content">
			<nav id="breadcrumb" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
					<li class="breadcrumb-item" aria-current="page">Inscription à la newsletter</li>
				</ol>
			</nav>

			<h2>Restez informé avec OpenCyclo</h2>
			<p>Recevez les dernières informations et les bons plans, pour un cyclisme agréable et civique.</p>
		</header>

		{!! Form::open(['route' => 'storeEmail']) !!}
		<div class="{!! $errors->has('email') ? 'has-error' : '' !!}">
			{!! Form::email('email', null, array('placeholder' => 'Entrez votre email')) !!}
			{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
		</div>
		{!! Form::submit('Envoyer !', ['class' => 'btn']) !!}
		{!! Form::close() !!}

	</section>

@endsection
