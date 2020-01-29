@extends('layouts.app')

@section('title', __('Liste des signalements'))


@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
		<li class="breadcrumb-item" aria-current="page">Liste des signalements</li>
	</ol>
</nav>
@endsection



@section('content')
<section class="base-page">

	<header>
		<h2 class="page-title">Liste des signalements <small>({{ $flags->total() }})</small></h2>
		@can('create', new App\Flag)
		<p><a href="{{ route('flags.create') }}">{{ __('Ajouter') }}</a></p>
		@endcan
	</header>

	<form method="GET" action="" accept-charset="UTF-8" class="form-inline">
		<div class="form-group">
			<label class="hidden" for="q" class="control-label">{{ __('Recherche') }}</label>
			<input placeholder="Rechercher..." name="q" type="text" id="q" value="{{ request('q') }}">
		</div>
		<input type="submit" value="Valider" class="btn">
		<a href="{{ route('flags.index') }}" class="btn">{{ __('Effacer') }}</a>
	</form>

	<table class="table table-sm table-responsive-sm">
		<thead>
			<tr>
				<th>{{ __('Identifiant') }}</th>
				<th>{{ __('Type d\'incident') }}</th>
				<th>{{ __('Latitude') }}</th>
				<th>{{ __('Longitude') }}</th>
				<th>{{ __('Action') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($flags as $key => $flag)
			<tr>
				<td># {{ $flags->firstItem() + $key }}</td>
				<td>{!! $flag->name_link !!}</td>
				<td>{{ $flag->latitude }}</td>
				<td>{{ $flag->longitude }}</td>
				<td>
					<a href="{{ route('flags.show', $flag) }}" id="show-flag-{{ $flag->id }}">{{ __('Voir') }}</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Pagination -->
	{{ $flags->appends(Request::except('page'))->render() }}

</section>

@endsection
