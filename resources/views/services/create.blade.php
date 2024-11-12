<!-- resources/views/services/create.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Créer un nouveau service pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('services.store', ['projetId' => $projet->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomService">Nom du Service</label>
            <input type="text" class="form-control" id="nomService" name="nomService" required>
        </div>
        <div class="form-group">
            <label for="typeService">Type de Service</label>
            <input type="text" class="form-control" id="typeService" name="typeService" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
