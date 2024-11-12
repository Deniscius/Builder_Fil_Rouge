<!-- resources/views/services/index.blade.php -->

@extends('layouts.projet')


@section('content')
    <h2>Liste des Services</h2>
    <a href="{{ route('services.create', ['projetId' => $projet->id]) }}" class="btn btn-primary mb-3">Créer un nouveau service</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Service</th>
                <th>Type de Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->nomService }}</td>
                    <td>{{ $service->typeService }}</td>
                    <td>
                        <a href="{{ route('services.edit', ['projetId' => $projet->id, 'id' => $service->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('services.destroy', ['projetId' => $projet->id, 'id' => $service->id]) }}" method="POST" style="display:inline;">
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
