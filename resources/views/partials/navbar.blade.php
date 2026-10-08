<!-- resources/views/partials/navbar.blade.php -->
<!-- Barre de navigation principale du site -->

<nav class="navbar">
    <!-- Lien vers la page d'accueil avec le nom du site en gras et légèrement plus grand -->
    <a href="{{ route('home') }}" style="font-weight: bold; font-size: 1.2rem;">
        TaskFlow
    </a>

    <!-- Lien vers la liste des projets -->
    <a href="{{ url('app/projets') }}">Projets</a>

    <!-- Lien vers le tableau de bord -->
    <a href="{{ route('app.dashboard') }}">Dashboard</a>

    <!-- Lien vers la liste des tâches -->
    <a href="{{ url('app/taches') }}">Tâches</a>
</nav>