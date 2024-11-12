<!-- resources/views/ressources/create.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Créer une nouvelle ressource pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('ressources.store', ['projetId' => $projet->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomRessource">Nom de la Ressource</label>
            <input type="text" class="form-control" id="nomRessource" name="nomRessource" required>
        </div>
        <div class="form-group">
            <label for="typeRessource">Type de Ressource</label>
            <input type="text" class="form-control" id="typeRessource" name="typeRessource" required>
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" required>
        </div>
        <div class="form-group">
            <label for="service_id">Service</label>
            <select class="form-control" id="service_id" name="service_id" required>
                <option value="">Sélectionnez un service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->nomService }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
