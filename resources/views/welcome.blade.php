@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <section class="hero">
        <h1>Bienvenue sur TaskFlow</h1>
        <p>TaskFlow vous aide à piloter vos projets, organiser les tâches et garder tous vos objectifs alignés avec vos deadlines.</p>
        <div class="hero-actions">
            <a href="{{ url('app/dashboard') }}" class="btn btn-primary">Voir le dashboard</a>
            <a href="{{ url('app/projets') }}" class="btn btn-secondary">Voir les projets</a>
            <a href="{{ url('app/projets/create') }}" class="btn btn-success">Créer un projet</a>
        </div>
    </section>

    <div class="card-grid">
        <div class="card">
            <h2>Organisez vos projets</h2>
            <p>Créez des projets clairs, suivez leur état et priorisez les tâches les plus importantes.</p>
        </div>
        <div class="card">
            <h2>Suivez votre productivité</h2>
            <p>Visualisez les tâches en cours, assignées à chaque membre et celles qui doivent être terminées rapidement.</p>
        </div>
        <div class="card">
            <h2>Collaborez facilement</h2>
            <p>Assignez des tâches aux membres, centralisez les informations et travaillez plus efficacement ensemble.</p>
        </div>
    </div>
@endsection
