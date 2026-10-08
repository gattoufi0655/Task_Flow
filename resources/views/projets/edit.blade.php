@extends('layouts.app')

@section('title', 'Modifier le projet')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 2rem;">
            <h1 style="margin-bottom: 0.5rem;">Modifier le projet</h1>
            <p style="color: #475569;">Mettez à jour les informations de votre projet.</p>
        </div>

        <div class="card">
            <form action="{{ route('app.projets.update', $projet) }}" method="POST">
                @csrf
                @method('PUT')

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
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $projet->nom) }}" required
                        placeholder="Ex: Site E-commerce">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4"
                        placeholder="Décrivez votre projet...">{{ old('description', $projet->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select id="statut" name="statut">
                        <option value="en_attente" {{ old('statut', $projet->statut) === 'en_attente' ? 'selected' : '' }}>En attente</option>
                        <option value="en_cours" {{ old('statut', $projet->statut) === 'en_cours' ? 'selected' : '' }}>En cours</option>
                        <option value="termine" {{ old('statut', $projet->statut) === 'termine' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', optional($projet->date_debut)->format('Y-m-d')) }}">
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de fin prévue</label>
                    <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', optional($projet->date_fin)->format('Y-m-d')) }}">
                </div>

                <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('app.projets.show', $projet) }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection
