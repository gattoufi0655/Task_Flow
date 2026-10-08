@props(['status'])

@php
    $labels = [
        'termine' => 'Terminé',
        'en_cours' => 'En cours',
        'en_attente' => 'En attente',
        'done' => 'Terminé',
        'in_progress' => 'En cours',
        'todo' => 'À faire',
    ];

    $classes = [
        'termine' => 'badge-success',
        'done' => 'badge-success',
        'en_cours' => 'badge-warning',
        'in_progress' => 'badge-warning',
        'en_attente' => 'badge-secondary',
        'todo' => 'badge-secondary',
    ];

    $label = $labels[$status] ?? ucfirst(str_replace('_', ' ', $status));
    $class = $classes[$status] ?? 'badge-secondary';
@endphp

<span class="badge {{ $class }}">{{ $label }}</span>