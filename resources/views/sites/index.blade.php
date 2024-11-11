<!-- resources/views/sites/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Sites</h1>
    <a href="{{ route('sites.create') }}" class="btn btn-primary mb-3">Créer un nouveau site</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Site</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
                <tr>
                    <td>{{ $site->id }}</td>
                    <td>{{ $site->nomSite }}</td>
                    <td>{{ $site->description }}</td>
                    <td>
                        <a href="{{ route('sites.edit', $site->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('sites.destroy', $site->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
