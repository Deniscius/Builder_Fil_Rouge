<!-- resources/views/ouvriers/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouvel ouvrier pour le Service {{ $serviceId }}</h1>
    <form action="{{ route('ouvriers.store') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $serviceId }}">
        <div class="form-group">
            <label for="nomOuvrier">Nom de l'Ouvrier</label>
            <input type="text" name="nomOuvrier" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
