@extends('layouts.template')

@section('titre')
	Un problème s'est produit
@endsection

@section('sous-titre')
	<p>Mais tout n'est pas perdu, reprenez votre navigation.</p>
@endsection

@section('contenu')

	<section class="form-center">
		<p>Notre base de données semble inaccessible pour le moment.</p>
		<p>Veuillez nous en excuser.</p>
	</section>

@endsection
