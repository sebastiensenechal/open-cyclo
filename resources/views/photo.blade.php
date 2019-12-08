@extends('template')

@section('titre')
    Importer une photo
@endsection

@section('contenu')


  <section class="form-center">
  	@if(session()->has('error'))
  		<div class="alert alert-danger">{!! session('error') !!}</div>
  	@endif
  	{!! Form::open(['url' => 'photo', 'files' => true]) !!}
  		<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
  			{!! Form::file('image', ['class' => 'form-control']) !!}
  			{!! $errors->first('image', '<small class="help-block">:message</small>') !!}
  		</div>
  		{!! Form::submit('Envoyer !', ['class' => 'btn btn-info']) !!}
  	{!! Form::close() !!}
  </section>

@endsection
