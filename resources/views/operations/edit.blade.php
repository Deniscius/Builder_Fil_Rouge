<!-- resources/views/operations/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'opération</h1>
        <form action="{{ route('operations.update', $operation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="projet_id" value="{{ $operation->projet_id }}">
            <div class="form-group">
                <label for="nomOperation">Nom de l'Opération</label>
                <input type="text" name="nomOperation" class="form-control" value="{{ $operation->nomOperation }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $operation->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="dateOperation">Date de l'Opération</label>
                <input type="date" name="dateOperation" class="form-control" value="{{ $operation->dateOperation }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
