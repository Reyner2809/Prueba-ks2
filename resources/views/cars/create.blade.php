@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Carro</h1>
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
            @error('marca')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required>
            @error('modelo')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" value="{{ old('anio') }}" required>
            @error('anio')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Color</label>
            <input type="text" name="color" class="form-control" value="{{ old('color') }}" required>
            @error('color')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
            @error('precio')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Kilometraje</label>
            <input type="number" name="kilometraje" class="form-control" value="{{ old('kilometraje') }}" required>
            @error('kilometraje')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
