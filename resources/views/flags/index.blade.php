@extends('layouts.app')

@section('title', __('Liste des signalements'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Flag)
            <a href="{{ route('flags.create') }}" class="btn btn-success">{{ __('Ajouter') }}</a>
        @endcan
    </div>
    <h1 class="page-title">Liste des signalements <small>({{ $flags->total() }})</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('Recherche') }}</label>
                        <input placeholder="Signalement" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="Valider" class="btn btn-secondary">
                    <a href="{{ route('flags.index') }}" class="btn btn-link">{{ __('Effacer') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th>{{ __('Identifiant') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Latitude') }}</th>
                        <th>{{ __('Longitude') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flags as $key => $flag)
                    <tr>
                        <td>{{ $flags->firstItem() + $key }}</td>
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
            <div class="card-body">{{ $flags->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
