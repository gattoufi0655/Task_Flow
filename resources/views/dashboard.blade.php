@extends('layouts.app')

@section('title', 'Dashboard TaskFlow')

@section('content')
    <h1>Dashboard</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-top: 1rem;">
        <div class="card">
            <h2>Total projets</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $totalProjets }}</p>
        </div>
        <div class="card">
            <h2>Total tâches</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $totalTaches }}</p>
        </div>
        <div class="card">
            <h2>Tâches ouvertes</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $openTaches }}</p>
        </div>
        <div class="card">
            <h2>Tâches terminées</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $completedTaches }}</p>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; margin-top: 1.5rem;">
        <div class="card">
            <h2>Projets récents</h2>
            @forelse($recentProjets as $projet)
                <div style="padding: 0.75rem 0; border-bottom: 1px solid #eee;">
                    <strong>{{ $projet->nom }}</strong>
                    <p style="margin: 0.25rem 0 0; color: #555;">{{ \Illuminate\Support\Str::limit($projet->description, 80) }}</p>
                </div>
            @empty
                <p>Aucun projet récent.</p>
            @endforelse
        </div>

        <div class="card">
            <h2>Tâches récentes</h2>
            @forelse($recentTaches as $tache)
                <div style="padding: 0.75rem 0; border-bottom: 1px solid #eee;">
                    <strong>{{ $tache->titre }}</strong>
                    <p style="margin: 0.25rem 0 0; color: #555;">Projet : {{ $tache->projet->nom ?? 'N/A' }}</p>
                    <p style="margin: 0.25rem 0 0; color: #555;">Assignée à : {{ $tache->user->name ?? 'Non assignée' }}</p>
                </div>
            @empty
                <p>Aucune tâche récente.</p>
            @endforelse
        </div>
    </div>

    <div class="card" style="margin-top: 1.5rem;">
        <h2>Top utilisateurs</h2>
        @if($topUsers->isEmpty())
            <p>Aucun utilisateur avec tâches assignées.</p>
        @else
            <ul>
                @foreach($topUsers as $user)
                    <li>{{ $user->name }} — {{ $user->assigned_tasks_count }} tâche(s)</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
