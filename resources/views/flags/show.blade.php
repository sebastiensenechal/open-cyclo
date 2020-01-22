@extends('layouts.app')

@section('title', __('Détails'))

@section('content')
<section class="row">
    <div class="col-md-6">
        <article class="card">
            <header class="card-header">
                <h2>Détails</h2>
            </header>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('Type') }}</td><td>{{ $flag->name }}</td></tr>
                        <tr><td>{{ __('Latitude') }}</td><td>{{ $flag->latitude }}</td></tr>
                        <tr><td>{{ __('Longitude') }}</td><td>{{ $flag->longitude }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @if(Auth::check() and Auth::user()->admin)
                    <a href="{{ route('flags.edit', $flag) }}" id="edit-flag-{{ $flag->id }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                    <a href="{{ route('flags.index') }}" class="btn btn-link">{{ __('Retour aux signalements') }}</a>
                @endif
                    <a href="{{ route('flag_map.index') }}" class="btn btn-link">{{ __('Retour à la carte') }}</a>
            </div>
        </article>
    </div>
    <div class="col-md-6">
        <aside class="card">
            <div class="card-header">{{ trans('Position') }}</div>
            @if ($flag->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('flag.no_coordinate') }}</div>
            @endif
        </aside>
    </div>
</section>
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
    {{ Html::script('js/MapsShow.js') }}
    <script>
        MapsShow.initMap([{{ $flag->latitude }}, {{ $flag->longitude }}]);
    </script>
@endpush
