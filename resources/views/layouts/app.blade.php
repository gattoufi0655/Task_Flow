<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskFlow')</title>
    <!-- CSS simple pour le TP -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #eef2ff;
            color: #1f2937;
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
            padding: 1rem 2rem;
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            align-items: center;
            justify-content: flex-start;
            overflow-x: auto;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            white-space: nowrap;
        }

        .navbar a + a {
            margin-left: 1rem;
        }

        .navbar a:hover {
            opacity: 0.85;
        }

        .container {
            max-width: 1180px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .hero {
            background: linear-gradient(180deg, rgba(99,102,241,0.12) 0%, rgba(255,255,255,0.9) 100%);
            border: 1px solid rgba(99,102,241,0.18);
            border-radius: 24px;
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 24px 60px rgba(99,102,241,0.12);
        }

        .hero h1 {
            font-size: clamp(2.5rem, 4vw, 4rem);
            margin-bottom: 1rem;
            color: #1e3a8a;
        }

        .hero p {
            font-size: 1.1rem;
            color: #334155;
            max-width: 760px;
            margin-bottom: 1.75rem;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 1.75rem;
            margin-bottom: 1rem;
            box-shadow: 0 10px 30px rgba(15,23,42,0.08);
            border: 1px solid rgba(15,23,42,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 50px rgba(15,23,42,0.12);
        }

        .btn {
            padding: 0.75rem 1.2rem;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.95;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-success {
            background: #14b8a6;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-color: #a7f3d0;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-color: #fecaca;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 700;
            color: #334155;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            background: #f8fafc;
            color: #0f172a;
            font-size: 0.98rem;
            transition: border-color 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4f46e5;
            background: white;
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #475569;
            margin-top: 2rem;
            font-size: 0.95rem;
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            font-size: 0.78rem;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background: #ffedd5;
            color: #7c2d12;
        }

        .badge-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        @media (max-width: 768px) {
            .navbar {
                justify-content: center;
                text-align: center;
            }

            .hero {
                padding: 2rem 1.25rem;
            }
        }
    </style>
    <!-- Ajouter du CSS depuis les pages : Cela permet à une page d’ajouter du CSS supplémentaire. -->
    @yield('styles')
</head>
<body>
    {{-- Navigation --}}
        @include('partials.navbar')
    {{-- Contenu principal --}}
    <main class="container">
        {{-- Messages flash --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @yield('content')
    </main>
    {{-- Pied de page --}}
    @include('partials.footer')

    @yield('scripts')
    </body>
</html>