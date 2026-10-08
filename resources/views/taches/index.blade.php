@extends('layouts.app')

@section('title', 'Mes Tâches')

@section('content')
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 style="margin-bottom: 0.5rem;">Mes Tâches</h1>
                <p style="color: #475569;">Gérez et suivez l'avancement de vos tâches.</p>
            </div>
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
                <form action="{{ route('app.taches.index') }}" method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
                    <label for="user_id" style="font-weight: 500;">Filtrer par utilisateur :</label>
                    <select id="user_id" name="user_id" style="padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;">
                        <option value="">Tous</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $selectedUser == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </form>
                <a href="{{ route('app.taches.create') }}" class="btn btn-success">+ Nouvelle tâche</a>
            </div>
        </div>
    </div>

    @forelse($taches as $tache)
        <div class="card" style="margin-bottom: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: start; gap: 1rem;">
                <div style="flex: 1;">
                    <h3 style="margin-bottom: 0.5rem; color: #1f2937;">{{ $tache->titre }}</h3>
                    <p style="margin-bottom: 0.75rem; color: #4b5563;">{{ $tache->description }}</p>
                    <div style="display: flex; gap: 1rem; font-size: 0.9rem; color: #6b7280;">
                        <span>Projet : <strong>{{ $tache->projet->nom ?? 'N/A' }}</strong></span>
                        <span>Assignée à : <strong>{{ $tache->user->name ?? 'Non assignée' }}</strong></span>
                    </div>
                </div>
                <div style="text-align: right; min-width: 150px;">
                    <x-status-badge status="{{ $tache->statut }}" />
                    <p style="margin-top: 0.5rem; font-weight: 500;">Priorité : {{ ucfirst($tache->priorite) }}</p>
                    @if($tache->date_echeance)
                        <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">
                            Échéance : {{ $tache->date_echeance->format('d/m/Y') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="card">
            <div style="text-align: center; padding: 2rem;">
                <p style="color: #6b7280; margin-bottom: 1rem;">Aucune tâche disponible pour le moment.</p>
                <a href="{{ route('app.taches.create') }}" class="btn btn-primary">Créer votre première tâche</a>
            </div>
        </div>
    @endforelse
@endsection
