<!-- resources/views/operations/edit.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Modifier l'opération pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('operations.update', ['projetId' => $projet->id, 'id' => $operation->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" value="{{ $operation->montant }}" required>
        </div>
        <div class="form-group">
            <label for="dateOperation">Date de l'Opération</label>
            <input type="date" class="form-control" id="dateOperation" name="dateOperation" value="{{ $operation->dateOperation }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $operation->description }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
