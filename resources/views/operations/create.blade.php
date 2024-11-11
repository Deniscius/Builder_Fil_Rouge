<!-- resources/views/operations/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle opération pour le Projet {{ $projetId }}</h1>
    <form action="{{ route('operations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="projet_id" value="{{ $projetId }}">
        <div class="form-group">
            <label for="nomOperation">Nom de l'Opération</label>
            <input type="text" name="nomOperation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="dateOperation">Date de l'Opération</label>
            <input type="date" name="dateOperation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
