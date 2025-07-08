@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">&larr; Volver al Dashboard</a>
    <h1 class="mb-4">Editar Perfil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
