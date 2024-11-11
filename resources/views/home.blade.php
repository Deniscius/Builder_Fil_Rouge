<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="{{ route('projets.index') }}"
                                class="list-group-item list-group-item-action">Projets</a>
                            {{-- <a href="{{ route('sites.index') }}" class="list-group-item list-group-item-action">Sites</a>
                            <a href="{{ route('services.index') }}" class="list-group-item list-group-item-action">Services</a>
                            <a href="{{ route('ouvriers.index') }}" class="list-group-item list-group-item-action">Ouvriers</a>
                            <a href="{{ route('ressources.index') }}" class="list-group-item list-group-item-action">Ressources</a>
                            <a href="{{ route('operations.index') }}" class="list-group-item list-group-item-action">Opérations</a> --}}
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h1>Bienvenue sur votre tableau de bord</h1>
                        <p>Cette page vous permet de gérer vos projets, sites, services, ouvriers, ressources et
                            opérations.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
