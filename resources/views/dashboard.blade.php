@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Bienvenido al Sistema de Concesionario</div>
                <div class="card-body">
                    @auth
                        <h4 class="mb-3">¡Hola, {{ Auth::user()->name }}!</h4>
                        <p>Desde este panel puedes gestionar tus autos registrados, agregar nuevos, editarlos o eliminarlos.</p>
                        <a href="{{ route('autos.index') }}" class="btn btn-success">Ir a Autos</a>
                    @else
                        <h4 class="mb-3">Bienvenido invitado</h4>
                        <p>Por favor, inicia sesión para gestionar tus autos.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
