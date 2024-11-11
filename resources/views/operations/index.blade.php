<!-- resources/views/operations/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Opérations pour le Projet {{ $projetId }}</h1>
    <a href="{{ route('operations.create', $projetId) }}" class="btn btn-primary mb-3">Créer une nouvelle opération</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'Opération</th>
                <th>Description</th>
                <th>Date de l'Opération</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($operations as $operation)
                <tr>
                    <td>{{ $operation->id }}</td>
                    <td>{{ $operation->nomOperation }}</td>
                    <td>{{ $operation->description }}</td>
                    <td>{{ $operation->dateOperation }}</td>
                    <td>
                        <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('operations.destroy', $operation->id) }}" method="POST" style="display:inline;">
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
