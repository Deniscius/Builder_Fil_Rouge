<!-- resources/views/projets/gerer.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gérer le Projet: {{ $projet->nomProjet }}</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                {{-- <a href="{{ route('sites.index', $projet->id) }}" class="list-group-item list-group-item-action">Sites</a> --}}
                <a href="{{ route('services.index', $projet->id) }}" class="list-group-item list-group-item-action">Services</a>
                <a href="{{ route('ouvriers.index', $projet->id) }}" class="list-group-item list-group-item-action">Ouvriers</a>
                <a href="{{ route('ressources.index', $projet->id) }}" class="list-group-item list-group-item-action">Ressources</a>
                <a href="{{ route('operations.index', $projet->id) }}" class="list-group-item list-group-item-action">Opérations</a>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Contenu dynamique pour gérer les entités du projet -->
        </div>
    </div>
</div>
@endsection
