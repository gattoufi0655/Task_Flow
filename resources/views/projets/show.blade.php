@extends('layouts.app')

@section('title', 'Projet : ' . $projet->nom)

@section('content')
    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 1.5rem; align-items: flex-start;">
        <div class="card" style="flex: 1 1 420px;">
            <h1 style="margin-bottom: 0.75rem;">{{ $projet->nom }}</h1>
            <p style="color: #475569; margin-bottom: 1.25rem;">{{ $projet->description }}</p>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem; color: #475569; font-size: 0.95rem;">
                <span><strong>Statut :</strong> {{ ucfirst(str_replace('_', ' ', $projet->statut)) }}</span>
                <span><strong>Début :</strong> {{ optional($projet->date_debut)->format('d/m/Y') ?? 'Non définie' }}</span>
                <span><strong>Fin :</strong> {{ optional($projet->date_fin)->format('d/m/Y') ?? 'Non définie' }}</span>
            </div>
        </div>

        <div class="card" style="flex: 1 1 280px; min-width: 280px;">
            <h2 style="margin-bottom: 0.75rem;">Actions</h2>
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                <a href="{{ route('app.projets.edit', $projet) }}" class="btn btn-primary">Modifier le projet</a>
                <form action="{{ route('app.projets.destroy', $projet) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce projet ?')">Supprimer</button>
                </form>
                <a href="{{ route('app.projets.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>

    <div class="card">
        <h2 style="margin-bottom: 1rem;">Tâches du projet</h2>
        @forelse($projet->taches as $tache)
            <div style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <strong>{{ $tache->titre }}</strong>
                        <p style="margin: 0.5rem 0 0; color: #475569;">{{ $tache->description }}</p>
                    </div>
                    <div style="text-align: right; min-width: 140px;">
                        <x-status-badge status="{{ $tache->statut }}" />
                        @if($tache->date_echeance)
                            <p style="margin: 0.75rem 0 0; color: #64748b; font-size: 0.95rem;">Échéance : {{ $tache->date_echeance->format('d/m/Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>Aucune tâche associée à ce projet.</p>
        @endforelse
    </div>
@endsection