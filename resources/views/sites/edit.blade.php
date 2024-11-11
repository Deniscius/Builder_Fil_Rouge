<!-- resources/views/sites/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le site</h1>
    <form action="{{ route('sites.update', $site->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomSite">Nom du Site</label>
            <input type="text" name="nomSite" class="form-control" value="{{ $site->nomSite }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $site->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
