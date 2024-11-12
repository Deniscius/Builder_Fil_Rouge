<!-- resources/views/layouts/projet.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Projet</title>
    <!-- Inclure les styles CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Inclure les styles CSS personnalisés -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Gérer le Projet: {{ $projet->nomProjet }}</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    {{-- <a href="{{ route('sites.index', $projet->id) }}" class="list-group-item list-group-item-action">Sites</a> --}}
                    <a href="{{ route('services.index', $projet->id) }}" class="list-group-item list-group-item-action">Services</a>
                    <a href="{{ route('ouvriers.index', $projet->id) }}" class="list-group-item list-group-item-action">Ouvriers</a>
                    <a href="{{ route('ressources.index', $projet->id) }}" class="list-group-item list-group-item-action">Ressources</a>
                    <a href="{{ route('operations.index', $projet->id) }}" class="list-group-item list-group-item-action">Opérations</a>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Inclure les scripts JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Inclure les scripts JavaScript personnalisés -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
