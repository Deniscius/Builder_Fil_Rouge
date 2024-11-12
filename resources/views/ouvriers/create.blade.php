<!-- resources/views/ouvriers/create.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Créer un nouvel ouvrier pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('ouvriers.store', ['projetId' => $projet->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomOuvrier">Nom de l'Ouvrier</label>
            <input type="text" class="form-control" id="nomOuvrier" name="nomOuvrier" required>
        </div>
        <div class="form-group">
            <label for="specialisation">Spécialisation</label>
            <input type="text" class="form-control" id="specialisation" name="specialisation" required>
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
