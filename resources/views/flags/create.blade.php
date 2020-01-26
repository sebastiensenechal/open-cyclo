@extends('layouts.app')

@section('title', __('Ajouter un signalement'))

@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{ url('flags') }}">Liste des signalements</a></li>
        <li class="breadcrumb-item" aria-current="page">Ajouter</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Signalement') }}</div>
            <form method="POST" action="{{ route('flags.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('Type d\'incident') }}</label>
                        <select id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
                            <option selected value="Travaux">Travaux</option>
                            <option value="Voie endommagée">Voie endommagée</option>
                            <option value="Autre perturbation">Autre perturbation</option>
                        </select>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        <!-- <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!} -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ __('Latitude') }}</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">{{ __('Longitude') }}</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div id="mapid"></div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Ajouter') }}" class="btn btn-success">
                    <a href="{{ route('flags.index') }}" class="btn btn-link">{{ __('Annuler') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin=""/>
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>

    {{ Html::script('js/MapsCreate.js') }}

    <script>
        MapsCreate.initMap();
    </script>
@endpush
