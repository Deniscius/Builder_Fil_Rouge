<!-- resources/views/ressources/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle ressource pour le Projet {{ $projetId }}</h1>
    <form action="{{ route('ressources.store') }}" method="POST">
        @csrf
        <input type="hidden" name="projet_id" value="{{ $projetId }}">
        <div class="form-group">
            <label for="nomRessource">Nom de la Ressource</label>
            <input type="text" name="nomRessource" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="quantite_initiale">Quantité Initiale</label>
            <input type="number" name="quantite_initiale" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="services">Services</label>
            <select name="services[]" class="form-control" multiple required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->nomService }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
