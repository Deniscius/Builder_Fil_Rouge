<!-- resources/views/ouvriers/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Ouvriers pour le Service {{ $serviceId }}</h1>
    <a href="{{ route('ouvriers.create', $serviceId) }}" class="btn btn-primary mb-3">Créer un nouvel ouvrier</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'Ouvrier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ouvriers as $ouvrier)
                <tr>
                    <td>{{ $ouvrier->id }}</td>
                    <td>{{ $ouvrier->nomOuvrier }}</td>
                    <td>
                        <a href="{{ route('ouvriers.edit', $ouvrier->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('ouvriers.destroy', $ouvrier->id) }}" method="POST" style="display:inline;">
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
