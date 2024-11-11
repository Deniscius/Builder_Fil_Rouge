<!-- resources/views/services/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le service</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="projet_id" value="{{ $service->projet_id }}">
        <div class="form-group">
            <label for="nomService">Nom du Service</label>
            <input type="text" name="nomService" class="form-control" value="{{ $service->nomService }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
