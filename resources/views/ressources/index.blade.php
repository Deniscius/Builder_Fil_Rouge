<!-- resources/views/ressources/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Ressources pour le Projet {{ $projetId }}</h1>
    <a href="{{ route('ressources.create', $projetId) }}" class="btn btn-primary mb-3">Créer une nouvelle ressource</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Ressource</th>
                <th>Description</th>
                <th>Quantité Initiale</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->id }}</td>
                    <td>{{ $ressource->nomRessource }}</td>
                    <td>{{ $ressource->description }}</td>
                    <td>{{ $ressource->quantite_initiale }}</td>
                    <td>
                        <a href="{{ route('ressources.edit', $ressource->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('ressources.destroy', $ressource->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
