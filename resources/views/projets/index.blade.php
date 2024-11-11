<!-- resources/views/projets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Projets</h1>
    <button class="btn btn-primary mb-3" id="createProjetBtn">Créer un nouveau projet</button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Projet</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projets as $projet)
                <tr>
                    <td>{{ $projet->id }}</td>
                    <td>{{ $projet->nomProjet }}</td>
                    <td>{{ $projet->dateDebut }}</td>
                    <td>{{ $projet->dateFin }}</td>
                    <td>
                        <button class="btn btn-warning editProjetBtn" data-id="{{ $projet->id }}" data-nom="{{ $projet->nomProjet }}" data-debut="{{ $projet->dateDebut }}" data-fin="{{ $projet->dateFin }}">Modifier</button>
                        <button class="btn btn-danger deleteProjetBtn" data-id="{{ $projet->id }}">Supprimer</button>
                        <a href="{{ route('projets.gerer', $projet->id) }}" class="btn btn-primary">Gérer Projet</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Projet Modal -->
    <div class="modal fade" id="createProjetModal" tabindex="-1" role="dialog" aria-labelledby="createProjetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProjetModalLabel">Créer un nouveau projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createProjetForm" action="{{ route('projets.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nomProjet">Nom du Projet</label>
                            <input type="text" name="nomProjet" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dateDebut">Date de Début</label>
                            <input type="date" name="dateDebut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dateFin">Date de Fin</label>
                            <input type="date" name="dateFin" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Projet Modal -->
    <div class="modal fade" id="editProjetModal" tabindex="-1" role="dialog" aria-labelledby="editProjetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjetModalLabel">Modifier le projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProjetForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nomProjet">Nom du Projet</label>
                            <input type="text" name="nomProjet" class="form-control" id="editNomProjet" required>
                        </div>
                        <div class="form-group">
                            <label for="dateDebut">Date de Début</label>
                            <input type="date" name="dateDebut" class="form-control" id="editDateDebut" required>
                        </div>
                        <div class="form-group">
                            <label for="dateFin">Date de Fin</label>
                            <input type="date" name="dateFin" class="form-control" id="editDateFin" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Projet Modal -->
    <div class="modal fade" id="deleteProjetModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProjetModalLabel">Supprimer le projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce projet ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form id="deleteProjetForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Créer un nouveau projet
    document.getElementById('createProjetBtn').addEventListener('click', function() {
        $('#createProjetModal').modal('show');
    });

    // Modifier un projet
    document.querySelectorAll('.editProjetBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var nom = this.getAttribute('data-nom');
            var debut = this.getAttribute('data-debut');
            var fin = this.getAttribute('data-fin');

            document.getElementById('editProjetForm').action = '{{ url('projets') }}/' + id;
            document.getElementById('editNomProjet').value = nom;
            document.getElementById('editDateDebut').value = debut;
            document.getElementById('editDateFin').value = fin;

            $('#editProjetModal').modal('show');
        });
    });

    // Supprimer un projet
    document.querySelectorAll('.deleteProjetBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            document.getElementById('deleteProjetForm').action = '{{ url('projets') }}/' + id;
            $('#deleteProjetModal').modal('show');
        });
    });
});
</script>
@endsection
