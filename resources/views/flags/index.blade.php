@extends('layouts.app')

@section('title', __('flag.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Flag)
            <a href="{{ route('flags.create') }}" class="btn btn-success">{{ __('flag.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('flag.list') }} <small>{{ __('app.total') }} : {{ $flags->total() }} {{ __('flag.flag') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('flag.search') }}</label>
                        <input placeholder="{{ __('flag.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('flag.search') }}" class="btn btn-secondary">
                    <a href="{{ route('flags.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('flag.name') }}</th>
                        <th>{{ __('flag.address') }}</th>
                        <th>{{ __('flag.latitude') }}</th>
                        <th>{{ __('flag.longitude') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flags as $key => $flag)
                    <tr>
                        <td class="text-center">{{ $flags->firstItem() + $key }}</td>
                        <td>{!! $flag->name_link !!}</td>
                        <td>{{ $flag->address }}</td>
                        <td>{{ $flag->latitude }}</td>
                        <td>{{ $flag->longitude }}</td>
                        <td class="text-center">
                            <a href="{{ route('flags.show', $flag) }}" id="show-flag-{{ $flag->id }}">{{ __('app.show') }}</a>
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
