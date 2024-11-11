<!-- resources/views/services/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Services pour le Projet {{ $projetId }}</h1>
        <a href="{{ route('services.create', ['projetId' => $projetId]) }}" class="btn btn-primary mb-3">Créer un nouveau
            service</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Service</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->nomService }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('services.edit', ['projetId' => $projetId, 'service' => $service->id]) }}"
                                class="btn btn-warning btn-sm">Modifier</a>

                            <form
                                action="{{ route('services.destroy', ['projetId' => $projetId, 'service' => $service->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>

                            <a href="{{ route('ouvriers.index', ['projetId' => $projetId, 'service' => $service->id]) }}"
                                class="btn btn-primary btn-sm">Gérer Ouvriers</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
