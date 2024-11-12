<!-- resources/views/services/edit.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Modifier le service pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('services.update', ['projetId' => $projet->id, 'id' => $service->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomService">Nom du Service</label>
            <input type="text" class="form-control" id="nomService" name="nomService" value="{{ $service->nomService }}" required>
        </div>
        <div class="form-group">
            <label for="typeService">Type de Service</label>
            <input type="text" class="form-control" id="typeService" name="typeService" value="{{ $service->typeService }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
