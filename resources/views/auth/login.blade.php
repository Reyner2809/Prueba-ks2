@extends('layouts.guest')
@section('content')
    <h2 class="auth-title text-center">Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" required autofocus>
            @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
        <div class="mt-3 text-center">
            <a href="{{ route('register') }}" class="text-decoration-none">¿No tienes cuenta? <b>Regístrate</b></a>
        </div>
    </form>
@endsection
