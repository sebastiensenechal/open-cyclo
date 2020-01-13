@extends('layouts.template')

@section('titre')
    Inscription à la newsletter
@endsection

@section('contenu')

<section class="form-center">
  <header id="header-content">
    <h2>Restez informé avec OpenCyclo</h2>
    <p>Recevez les dernières informations et les bons plans, pour un cyclisme agréable et civique.</p>
  </header>

  {!! Form::open(['route' => 'storeEmail']) !!}
		<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			{!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}
			{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
		</div>
		{!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
	{!! Form::close() !!}

</section>

@endsection
