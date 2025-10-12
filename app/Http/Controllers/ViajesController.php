<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;

class ViajesController extends Controller
{
    /**
     * Muestra la lista de viajes.
     */
    public function index()
    {
        
        $viajes = Viaje::where('FlagBorradoLogico', false)->get();

        return view('admin.operativo.viajes.index', compact('viajes'));
    }

    /**
     * Muestra el formulario para crear un nuevo viaje.
     */
    public function create()
    {
        return view('admin.operativo.viajes.create');
    }
    /**
 * Muestra el formulario para editar un viaje existente.
 */
public function edit($id)
{
    $viaje = Viaje::findOrFail($id);
    return view('admin.operativo.viajes.edit', compact('viaje'));
}

/**
 * Actualiza un viaje en la base de datos.
 */
public function update(Request $request, $id)
{
    $viaje = Viaje::findOrFail($id);

    $validated = $request->validate([
        'origen' => 'required|string|max:255',
        'destino' => 'required|string|max:255',
        'FlagActivo' => 'nullable|boolean',
    ]);

    $viaje->update([
        'origen' => $validated['origen'],
        'destino' => $validated['destino'],
        'FlagActivo' => $validated['FlagActivo'] ?? true,
        'UserModificacion' => Auth::id(),
        'FechaModificacion' => now(),
    ]);

    return redirect()->route('admin.operativo.viajes.index')
                     ->with('success', 'Viaje actualizado correctamente.');
}

/**
 * Realiza un borrado lógico del viaje.
 */
public function destroy($id)
{
    $viaje = Viaje::findOrFail($id);
    $viaje->update([
        'FlagBorradoLogico' => true,
        'UserModificacion' => Auth::id(),
        'FechaModificacion' => now(),
    ]);

    return redirect()->route('admin.operativo.viajes.index')
                     ->with('success', 'Viaje eliminado correctamente.');
}
public function toggle($id)
{
    $viaje = Viaje::findOrFail($id);
    $viaje->FlagActivo = !$viaje->FlagActivo;
    $viaje->UserModificacion = Auth::id();
    $viaje->FechaModificacion = now();
    $viaje->save();

    return redirect()->route('admin.operativo.viajes.index')
                     ->with('success', 'Estado del viaje actualizado correctamente.');
}

    /**
     * Guarda un nuevo viaje en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'FlagActivo' => 'nullable|boolean',
            'FlagBorradoLogico' => 'nullable|boolean',
        ]);

        // Valores por defecto
        $validated['FlagActivo'] = $validated['FlagActivo'] ?? true;
        $validated['FlagBorradoLogico'] = $validated['FlagBorradoLogico'] ?? false;
        $validated['UserCreacion'] = Auth::id(); // Usuario de sesión
        $validated['FechaCreacion'] = now();
        $validated['UserModificacion'] = null;
        $validated['FechaModificacion'] = null;

        // Crear el viaje
        Viaje::create($validated);

        return redirect()->route('admin.operativo.viajes.index')
                         ->with('success', 'Viaje registrado correctamente.');
    }
}
