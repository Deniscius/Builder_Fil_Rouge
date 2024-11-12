<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Builder</title>

    <!-- Liens vers Bootstrap CSS et Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* Styles pour le body et le conteneur principal */
        html, body {
            height: 100%;
            margin: 0;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Styles pour le background de la page */
        body {
            background-image: url('{{ asset('images/BTP Confort Avenir.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }

        /* Styles pour l'en-tête */
        .navbar {
            background-color: rgba(52, 58, 64, 0.8);
        }

        .navbar-brand,
        .nav-link,
        .dropdown-item {
            color: #ffffff !important;
        }

        /* Styles pour le menu latéral */
        .list-group-item {
            font-weight: 500;
            color: #495057;
            background-color: rgba(255, 255, 255, 0.8);
            transition: 0.3s;
        }

        .list-group-item:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Styles pour le contenu principal */
        .dashboard-content {
            background-color: rgba(255, 255, 255, 0.9); /* Légère transparence */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #343a40;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        p.lead {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
        }

        /* Styles pour le footer */
        footer {
            background-color: rgba(52, 58, 64, 0.8);
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        footer a {
            color: #007bff;
        }

        footer a:hover {
            text-decoration: none;
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Builder
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <!-- Sidebar Menu -->
                    <div class="col-md-3">
                        <div class="list-group">
                            <a href="{{ route('projets.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-project-diagram"></i> Projets
                            </a>
                        </div>
                    </div>
                    <!-- Dashboard Content -->
                    <div class="col-md-9">
                        <div class="dashboard-content">
                            <h1>Bienvenue sur Builder</h1>
                            <p class="lead">Votre site de gestion de projets de construction</p>
                            <a href="{{ route('projets.index') }}" class="btn btn-primary mt-3">Voir les Projets</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p>&copy; 2024 Builder. Tous droits réservés.</p>
                <p>Suivez-nous :
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div>
        </footer>
    </div>

    <!-- Scripts JS nécessaires pour Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
