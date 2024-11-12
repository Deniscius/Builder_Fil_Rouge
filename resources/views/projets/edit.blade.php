<!-- resources/views/projets/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le projet</h1>
        <form action="{{ route('projets.update', $projet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomProjet">Nom du projet</label>
                <input type="text" class="form-control" id="nomProjet" name="nomProjet" value="{{ $projet->nomProjet }}" required>
            </div>
            <div class="form-group">
                <label for="dateDebut">Date de début</label>
                <input type="date" class="form-control" id="dateDebut" name="dateDebut" value="{{ $projet->dateDebut }}" required>
            </div>
            <div class="form-group">
                <label for="dateFin">Date de fin</label>
                <input type="date" class="form-control" id="dateFin" name="dateFin" value="{{ $projet->dateFin }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
