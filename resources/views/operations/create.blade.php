<!-- resources/views/operations/create.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Créer une nouvelle opération pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('operations.store', ['projetId' => $projet->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" required>
        </div>
        <div class="form-group">
            <label for="dateOperation">Date de l'Opération</label>
            <input type="date" class="form-control" id="dateOperation" name="dateOperation" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
