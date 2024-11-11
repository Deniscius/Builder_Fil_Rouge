<!-- resources/views/services/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouveau service pour le Projet {{ $projetId }}</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <input type="hidden" name="projet_id" value="{{ $projetId }}">
        <div class="form-group">
            <label for="nomService">Nom du Service</label>
            <input type="text" name="nomService" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
