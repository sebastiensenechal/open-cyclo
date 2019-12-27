@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

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

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2>Profil admin (<span>{!! link_to_route('user.edit', 'Modifier', [Auth::user()->id]) !!}</span>)</h2>
              </div>
              <div class="panel-body">
        				<p>Pseudo : {{ Auth::user()->name }}</p>
        				<p>Email : {{ Auth::user()->email }}</p>
                <p>Rôle :
                @if (Auth::user()->admin === 1)
                    Administrateur
                @else
                    Abonné(e)
                @endif
                </p>
        			</div>
            </div>
        </div>


        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                  <h2>Liens utiles</h2>
                  <ul>
                    <li><a href="user">Administrer les utilisateurs</a></li>
                  </ul>
                </div>

                <div class="card-body">
                    <p>Lorem ipsum</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
