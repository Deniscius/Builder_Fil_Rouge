<!-- resources/views/ressources/index.blade.php -->

@extends('layouts.projet')


@section('content')
    <h2>Liste des Ressources</h2>
    <a href="{{ route('ressources.create', ['projetId' => $projet->id]) }}" class="btn btn-primary mb-3">Créer une nouvelle ressource</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Ressource</th>
                <th>Type de Ressource</th>
                <th>Quantité</th>
                <th>Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->id }}</td>
                    <td>{{ $ressource->nomRessource }}</td>
                    <td>{{ $ressource->typeRessource }}</td>
                    <td>{{ $ressource->quantite }}</td>
                    <td>{{ $ressource->service->nomService }}</td>
                    <td>
                        <a href="{{ route('ressources.edit', ['projetId' => $projet->id, 'id' => $ressource->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('ressources.destroy', ['projetId' => $projet->id, 'id' => $ressource->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
