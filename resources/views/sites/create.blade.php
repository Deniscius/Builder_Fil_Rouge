<!-- resources/views/sites/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un nouveau site</h1>
    <form action="{{ route('sites.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomSite">Nom du Site</label>
            <input type="text" name="nomSite" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
