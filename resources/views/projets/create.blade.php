<!-- resources/views/projets/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un nouveau projet</h1>
        <form action="{{ route('projets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomProjet">Nom du projet</label>
                <input type="text" class="form-control" id="nomProjet" name="nomProjet" required>
            </div>
            <div class="form-group">
                <label for="dateDebut">Date de début</label>
                <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
            </div>
            <div class="form-group">
                <label for="dateFin">Date de fin</label>
                <input type="date" class="form-control" id="dateFin" name="dateFin" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
