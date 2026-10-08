@extends('layouts.app')

@section('title', 'Nouvelle tâche')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 2rem;">
            <h1 style="margin-bottom: 0.5rem;">Créer une nouvelle tâche</h1>
            <p style="color: #475569;">Définissez les détails de votre tâche pour l'ajouter à un projet.</p>
        </div>

        <div class="card">
            <form action="{{ route('app.taches.store') }}" method="POST">
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="titre">Titre *</label>
                    <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required
                        placeholder="Ex: Implémenter la page de connexion">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4"
                        placeholder="Décrivez la tâche en détail...">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="projet_id">Projet *</label>
                    <select id="projet_id" name="projet_id" required>
                        <option value="">Sélectionnez un projet</option>
                        @foreach($projets as $projet)
                            <option value="{{ $projet->id }}" {{ old('projet_id') == $projet->id ? 'selected' : '' }}>
                                {{ $projet->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Assignée à</label>
                    <select id="user_id" name="user_id">
                        <option value="">Aucun utilisateur</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select id="statut" name="statut" required>
                        <option value="todo" {{ old('statut') == 'todo' ? 'selected' : '' }}>À faire</option>
                        <option value="in_progress" {{ old('statut') == 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="done" {{ old('statut') == 'done' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priorite">Priorité</label>
                    <select id="priorite" name="priorite" required>
                        <option value="basse" {{ old('priorite') == 'basse' ? 'selected' : '' }}>Basse</option>
                        <option value="moyenne" {{ old('priorite') == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                        <option value="haute" {{ old('priorite') == 'haute' ? 'selected' : '' }}>Haute</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_echeance">Date d'échéance</label>
                    <input type="date" id="date_echeance" name="date_echeance" value="{{ old('date_echeance') }}">
                </div>

                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button type="submit" class="btn btn-success">Créer la tâche</button>
                    <a href="{{ route('app.taches.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection
