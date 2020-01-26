@extends('layouts.app')

@section('content')
<section class="base-page">

        @if (session('status'))
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @if(session()->has('info'))
            <div class="notification is-success">
                {{ session('info') }}
            </div>
        @endif

        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif

            <header>
                <nav id="breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('map') }}">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tableau de bord</li>
                    </ol>
                </nav>

                <h2>{{ Auth::user()->name }} (<span>{!! link_to_route('user.edit', 'Modifier', [Auth::user()->id]) !!}</span>)</h2>
            </header>

        				<p>Pseudo : {{ Auth::user()->name }}</p>
        				<p>Email : {{ Auth::user()->email }}</p>
                <p>Rôle :
                @if (Auth::user()->admin === 1)
                    Administrateur
                @else
                    Abonné(e)
                @endif
                </p>

</section>
@endsection
