@extends('layouts.app')

@section('title', __('Modifier'))


@section('header')
<nav id="breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{ url('flags') }}">Liste des signalements</a></li>
        <li class="breadcrumb-item" aria-current="page">Modifier</li>
    </ol>
</nav>
@endsection


@section('content')
        @if (request('action') == 'delete' && $flag)
        @can('delete', $flag)
            <div class="card">
                <div class="card-header">{{ __('Suppression') }}</div>
                <div class="card-body">
                    <label class="control-label text-primary">{{ __('Type') }}</label>
                    <p>{{ $flag->name }}</p>
                    <label class="control-label text-primary">{{ __('Latitude') }}</label>
                    <p>{{ $flag->latitude }}</p>
                    <label class="control-label text-primary">{{ __('Longitude') }}</label>
                    <p>{{ $flag->longitude }}</p>
                    {!! $errors->first('flag_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('Confirmer la suppression') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('flags.destroy', $flag) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="flag_id" type="hidden" value="{{ $flag->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('Confirmer la suppression') }}</button>
                    </form>
                    <a href="{{ route('flags.edit', $flag) }}" class="btn btn-link">{{ __('Annuler') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('Modifier') }}</div>
            <form method="POST" action="{{ route('flags.update', $flag) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('Type') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $flag->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ __('Latitude') }}</label>
                                <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', $flag->latitude) }}" required>
                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="control-label">{{ __('Longitude') }}</label>
                                <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', $flag->longitude) }}" required>
                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div id="mapid"></div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('Mettre à jour') }}" class="btn">
                    <a href="{{ route('flags.show', $flag) }}" class="btn btn-link">{{ __('Annuler') }}</a>
                    @can('delete', $flag)
                        <a href="{{ route('flags.edit', [$flag, 'action' => 'delete']) }}" id="del-flag-{{ $flag->id }}" class="btn">{{ __('Supprimer') }}</a>
                    @endcan
                </div>
            </form>
        </div>
@endif
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
