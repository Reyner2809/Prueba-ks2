@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">&larr; Volver al Dashboard</a>
    <h1 class="mb-4">Listado de Autos</h1>
    <a href="{{ route('autos.create') }}" class="btn btn-success mb-3">Agregar Auto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Buscador -->
    <form method="GET" class="row g-3 mb-4 align-items-end" id="filtros-form">
        <div class="col-md-4">
            <label for="busqueda" class="form-label">Buscar (marca, modelo o color)</label>
            <input type="text" name="busqueda" id="busqueda" class="form-control" value="{{ $filtros['busqueda'] ?? '' }}" placeholder="Buscar...">
        </div>
        @if(isset($usuarios) && count($usuarios) > 0)
        <div class="col-md-3">
            <label for="usuario_id" class="form-label">Filtrar por usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-select">
                <option value="">Todos</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ (isset($filtros['usuario_id']) && $filtros['usuario_id'] == $usuario->id) ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="col-md-3">
            <label for="anio" class="form-label">Filtrar por año</label>
            <select name="anio" id="anio" class="form-select">
                <option value="">Todos</option>
                @foreach($anios as $anio)
                    <option value="{{ $anio }}" {{ (isset($filtros['anio']) && $filtros['anio'] == $anio) ? 'selected' : '' }}>{{ $anio }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            <a href="{{ route('autos.index') }}" class="btn btn-outline-secondary ms-2">Limpiar</a>
        </div>
    </form>
    <!-- Fin filtros -->
    <script>
        document.getElementById('usuario_id')?.addEventListener('change', function() {
            document.getElementById('filtros-form').submit();
        });
        document.getElementById('anio')?.addEventListener('change', function() {
            document.getElementById('filtros-form').submit();
        });
        document.getElementById('busqueda')?.addEventListener('input', function() {
            clearTimeout(window.busquedaTimeout);
            window.busquedaTimeout = setTimeout(function() {
                document.getElementById('filtros-form').submit();
            }, 400);
        });
    </script>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
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
                @forelse($autos as $auto)
                <tr>
                    <td>
                        @if($auto->imagen)
                            <img src="{{ asset('imagenes/' . $auto->imagen) }}" alt="Imagen auto" style="width:60px;height:60px;object-fit:cover;border-radius:6px;">
                        @else
                            <div style="width:60px;height:60px;background:#e0e0e0;display:flex;align-items:center;justify-content:center;border-radius:6px;">
                                <span style="font-size:2rem;color:#888;">?</span>
                            </div>
                        @endif
                    </td>
                    <td>{{ $auto->marca }}</td>
                    <td>{{ $auto->modelo }}</td>
                    <td>{{ $auto->anio }}</td>
                    <td>{{ $auto->color }}</td>
                    <td>${{ number_format($auto->precio, 2) }}</td>
                    <td>{{ number_format($auto->kilometraje) }} km</td>
                    <td>
                        <a href="{{ route('autos.edit', $auto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('autos.destroy', $auto) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este auto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No se encontraron autos.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $autos->links() }}
        </div>
    </div>
</div>
@endsection
