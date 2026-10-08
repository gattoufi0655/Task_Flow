@extends('layouts.app')

@section('title', 'Mes Projets')

@section('content')
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 1rem; align-items: center; margin-bottom: 1.5rem;">
        <div>
            <h1>Mes Projets</h1>
            <p style="color: #475569; margin-top: 0.5rem;">Visualisez vos projets en cours, planifiés et terminés.</p>
        </div>
        <a href="{{ url('app/projets/create') }}" class="btn btn-primary">
            + Nouveau Projet
        </a>
    </div>

    <div class="card-grid">
        @forelse($projets as $projet)
            <div class="card">
                <div style="display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
                    <div style="min-width: 220px;">
                        <h3 style="margin-bottom: 0.75rem;">{{ $projet->nom }}</h3>
                        <p style="color: #475569;">{{ Str::limit($projet->description, 120) }}</p>
                        @if(isset($projet->taches_count))
                            <p style="margin-top: 0.75rem; color: #64748b; font-size: 0.95rem;">{{ $projet->taches_count }} tâche(s)</p>
                        @endif
                    </div>
                    <div style="text-align: right;">
                        @if($projet->statut === 'termine')
                            <x-status-badge status="termine" />
                        @elseif($projet->statut === 'en_cours')
                            <x-status-badge status="en_cours" />
                        @else
                            <x-status-badge status="en_attente" />
                        @endif
                    </div>
                </div>
                <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
                    <a href="{{ url('app/projets/' . $projet->id) }}" class="btn btn-primary">Voir</a>
                    <span style="color: #94a3b8; font-size: 0.95rem;">Créé le {{ optional($projet->created_at)->format('d/m/Y') ?? 'N/A' }}</span>
                </div>
            </div>
        @empty
            <div class="card">
                <p>Aucun projet trouvé. Créez votre premier projet !</p>
            </div>
        @endforelse
    </div>
@endsection