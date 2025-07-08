@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">&larr; Volver al Dashboard</a>
    <h1 class="mb-4">Editar Auto</h1>
    <form action="{{ route('autos.update', $auto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca', $auto->marca) }}" required maxlength="50">
            @error('marca')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $auto->modelo) }}" required maxlength="50">
            @error('modelo')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Año</label>
            <input type="number" name="anio" class="form-control" value="{{ old('anio', $auto->anio) }}" required min="1900" max="2100">
            @error('anio')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Color</label>
            <input type="text" name="color" class="form-control" value="{{ old('color', $auto->color) }}" required maxlength="30">
            @error('color')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $auto->precio) }}" required min="0" max="99999999">
            @error('precio')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Kilometraje</label>
            <input type="number" name="kilometraje" class="form-control" value="{{ old('kilometraje', $auto->kilometraje) }}" required min="0" max="2147483647">
            @error('kilometraje')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen (opcional)</label>
            @if($auto->imagen)
                <div class="mb-2">
                    <img src="{{ asset('imagenes/' . $auto->imagen) }}" alt="Imagen actual" style="max-width:120px;max-height:120px;object-fit:cover;">
                </div>
            @endif
            <input type="file" name="imagen" class="form-control" accept="image/*">
            @error('imagen')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('autos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
