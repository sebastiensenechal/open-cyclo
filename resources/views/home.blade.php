@extends('layouts.app')

@section('content')
<div class="container">
    <section class="row justify-content-center">

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

        <article class="py-2 col-sm-12 col-md-8 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h2>Profil admin (<span>{!! link_to_route('user.edit', 'Modifier', [Auth::user()->id]) !!}</span>)</h2>
              </div>
              <div class="card-body p-4">
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
        </article>

        <article class="py-2 col-sm-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h2>Carte</h2>
                </div>

                <div class="card-body p-4">
                  <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('flags.index') }}">Administrer les signalements</a>
                    </li>
                  </ul>
                </div>
            </div>
        </article>


        <article class="py-2 col-sm-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h2>Articles</h2>
                </div>

                <div class="card-body p-4">
                  <ul>
                    <li><a href="posts">Voir tous les articles</a></li>
                    <li><a href="{{ route('posts.create') }}" title="Formulaire d'ajout d'article">Ajouter</a></li>
                  </ul>
                </div>
            </div>
        </article>


        <article class="py-2 col-sm-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h2>Utilisateurs</h2>
                </div>

                <div class="card-body p-4">
                  <ul>
                    <li><a href="user">Administrer les utilisateurs</a></li>
                  </ul>
                </div>
            </div>
        </article>

    </section>
</div>
@endsection
