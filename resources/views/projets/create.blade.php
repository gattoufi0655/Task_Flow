@extends('layouts.app')

@section('title', 'Nouveau Projet')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 2rem;">
            <h1 style="margin-bottom: 0.5rem;">Créer un nouveau projet</h1>
            <p style="color: #475569;">Définissez les détails de votre projet pour commencer à organiser vos tâches.</p>
        </div>

        <div class="card">
            <form action="{{ url('app/projets') }}" method="POST">
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
                    <label for="nom">Nom du projet *</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required
                        placeholder="Ex: Site E-commerce">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4"
                        placeholder="Décrivez votre projet...">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select id="statut" name="statut">
                        <option value="en_attente" {{ old('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                        <option value="en_cours" {{ old('statut') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="termine" {{ old('statut') == 'termine' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de fin prévue</label>
                    <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
                </div>

                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button type="submit" class="btn btn-success">Créer le projet</button>
                    <a href="{{ url('app/projets') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection