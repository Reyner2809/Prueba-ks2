@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Carros</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Agregar Carro</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Kilometraje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->marca }}</td>
                <td>{{ $car->modelo }}</td>
                <td>{{ $car->anio }}</td>
                <td>{{ $car->color }}</td>
                <td>{{ $car->precio }}</td>
                <td>{{ $car->kilometraje }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este carro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
