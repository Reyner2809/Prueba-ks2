<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoController extends Controller
{
    public function index(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $query = \App\Models\Auto::query();

        // Buscador
        if ($request->filled('busqueda')) {
            $busqueda = $request->busqueda;
            $query->where(function($q) use ($busqueda) {
                $q->where('marca', 'like', "%$busqueda%")
                  ->orWhere('modelo', 'like', "%$busqueda%")
                  ->orWhere('color', 'like', "%$busqueda%") ;
            });
        }

        $usuarios = [];
        if ($user->email === 'admin@email.com') {
            $usuarios = \App\Models\Usuario::all();
            if ($request->filled('usuario_id')) {
                $query->where('user_id', $request->usuario_id);
            }
        } else {
            $query->where('user_id', $user->id);
        }

        $anios = \App\Models\Auto::select('anio')->distinct()->orderBy('anio', 'desc')->pluck('anio');
        if ($request->filled('anio')) {
            $query->where('anio', $request->anio);
        }

        $autos = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('autos.index', [
            'autos' => $autos,
            'usuarios' => $usuarios,
            'anios' => $anios,
            'filtros' => $request->only(['usuario_id', 'anio', 'busqueda'])
        ]);
    }

    public function create()
    {
        return view('autos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'anio' => 'required|integer|min:1900|max:2100',
            'color' => 'required|max:30',
            'precio' => 'required|numeric|min:0|max:99999999',
            'kilometraje' => 'required|integer|min:0|max:2147483647',
            'imagen' => 'nullable|image|max:2048',
        ]);
        $validated['user_id'] = Auth::id();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = uniqid('auto_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imagenes'), $filename);
            $validated['imagen'] = $filename;
        }
        Auto::create($validated);
        return redirect()->route('autos.index')->with('success', 'Auto creado exitosamente.');
    }

    public function edit(Auto $auto)
    {
        return view('autos.edit', ['auto' => $auto]);
    }

    public function update(Request $request, Auto $auto)
    {
        $validated = $request->validate([
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'anio' => 'required|integer|min:1900|max:2100',
            'color' => 'required|max:30',
            'precio' => 'required|numeric|min:0|max:99999999',
            'kilometraje' => 'required|integer|min:0|max:2147483647',
            'imagen' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = uniqid('auto_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imagenes'), $filename);
            $validated['imagen'] = $filename;
        }
        $auto->update($validated);
        return redirect()->route('autos.index')->with('success', 'Auto actualizado exitosamente.');
    }

    public function destroy(Auto $auto)
    {
        $auto->delete();
        return redirect()->route('autos.index')->with('success', 'Auto eliminado exitosamente.');
    }
}
