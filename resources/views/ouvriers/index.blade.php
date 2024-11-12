<!-- resources/views/ouvriers/index.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Liste des Ouvriers</h2>
    <a href="{{ route('ouvriers.create', ['projetId' => $projet->id]) }}" class="btn btn-primary mb-3">Créer un nouvel ouvrier</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'Ouvrier</th>
                <th>Spécialisation</th>
                <th>Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ouvriers as $ouvrier)
                <tr>
                    <td>{{ $ouvrier->id }}</td>
                    <td>{{ $ouvrier->nomOuvrier }}</td>
                    <td>{{ $ouvrier->specialisation }}</td>
                    <td>{{ $ouvrier->service->nomService }}</td>
                    <td>
                        <a href="{{ route('ouvriers.edit', ['projetId' => $projet->id, 'id' => $ouvrier->id]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('ouvriers.destroy', ['projetId' => $projet->id, 'id' => $ouvrier->id]) }}" method="POST" style="display:inline;">
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
