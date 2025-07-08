<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #e0e7ef 0%, #f8fafc 100%);
        }
        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }
        .main-content {
            min-height: 80vh;
        }
        .sidebar {
            background: #1a365d;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #2563eb;
        }
        .card-metric {
            border-radius: 1.2rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            background: #fff;
            padding: 2rem 1.5rem;
            text-align: center;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <x-application-logo style="height:32px;width:32px;" />
                <span>Sistema Concesionario</span>
            </a>
            <div class="ms-auto">
                @auth
                    <span class="me-3">{{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm me-2">Perfil</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Salir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Iniciar sesión</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="main-content container pb-5">
        @yield('content')
    </main>
    <footer class="text-center text-muted py-3 small" style="opacity:0.7;">
        &copy; {{ date('Y') }} Sistema de Concesionario. Todos los derechos reservados.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
