<!-- resources/views/ouvriers/edit.blade.php -->

@extends('layouts.projet')

@section('content')
    <h2>Modifier l'ouvrier pour le projet {{ $projet->nomProjet }}</h2>
    <form action="{{ route('ouvriers.update', ['projetId' => $projet->id, 'id' => $ouvrier->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomOuvrier">Nom de l'Ouvrier</label>
            <input type="text" class="form-control" id="nomOuvrier" name="nomOuvrier" value="{{ $ouvrier->nomOuvrier }}" required>
        </div>
        <div class="form-group">
            <label for="specialisation">Spécialisation</label>
            <input type="text" class="form-control" id="specialisation" name="specialisation" value="{{ $ouvrier->specialisation }}" required>
        </div>
        <div class="form-group">
            <label for="service_id">Service</label>
            <select class="form-control" id="service_id" name="service_id" required>
                <option value="">Sélectionnez un service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $ouvrier->service_id == $service->id ? 'selected' : '' }}>{{ $service->nomService }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
