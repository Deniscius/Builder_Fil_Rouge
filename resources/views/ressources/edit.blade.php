<!-- resources/views/ressources/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la ressource</h1>
    <form action="{{ route('ressources.update', $ressource->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="projet_id" value="{{ $ressource->projet_id }}">
        <div class="form-group">
            <label for="nomRessource">Nom de la Ressource</label>
            <input type="text" name="nomRessource" class="form-control" value="{{ $ressource->nomRessource }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $ressource->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantite_initiale">Quantité Initiale</label>
            <input type="number" name="quantite_initiale" class="form-control" value="{{ $ressource->quantite_initiale }}" required>
        </div>
        <div class="form-group">
            <label for="services">Services</label>
            <select name="services[]" class="form-control" multiple required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $ressource->services->contains($service->id) ? 'selected' : '' }}>{{ $service->nomService }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
