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
        .concesionario-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
        }
        .auth-card {
            border-radius: 1.5rem;
            box-shadow: 0 6px 32px rgba(0,0,0,0.10);
            background: #fff;
            padding: 2.5rem 2rem 2rem 2rem;
        }
        .auth-title {
            font-weight: 600;
            color: #1a365d;
            margin-bottom: 1.5rem;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="concesionario-logo mb-2">
            <a href="/">
                <x-application-logo class="w-100 h-100" />
            </a>
        </div>
        <div class="auth-card w-100" style="max-width: 420px;">
            @yield('content')
        </div>
        <footer class="mt-4 text-muted small text-center" style="opacity:0.7;">
            &copy; {{ date('Y') }} Sistema de Concesionario. Todos los derechos reservados.
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
