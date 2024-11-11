<!-- resources/views/ouvriers/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'ouvrier</h1>
    <form action="{{ route('ouvriers.update', $ouvrier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="service_id" value="{{ $ouvrier->service_id }}">
        <div class="form-group">
            <label for="nomOuvrier">Nom de l'Ouvrier</label>
            <input type="text" name="nomOuvrier" class="form-control" value="{{ $ouvrier->nomOuvrier }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
