<!-- resources/views/operations/index.blade.php -->

@extends('layouts.projet')
@extends('layouts.app')

@section('content')
    <h2>Liste des Opérations</h2>
    <a href="{{ route('operations.create', ['projetId' => $projet->id]) }}" class="btn btn-primary mb-3">Créer une nouvelle opération</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Montant</th>
                <th>Date de l'Opération</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operations as $operation)
                <tr>
                    <td>{{ $operation->id }}</td>
                    <td>{{ $operation->montant }}</td>
                    <td>{{ $operation->dateOperation }}</td>
                    <td>{{ $operation->description }}</td>
                    <td>
                        <a href="{{ route('operations.edit', ['projetId' => $projet->id, 'id' => $operation->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('operations.destroy', ['projetId' => $projet->id, 'id' => $operation->id]) }}" method="POST" style="display:inline;">
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
