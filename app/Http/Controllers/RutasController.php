<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutasController extends Controller
{
    /**
     * Mostrar el listado de rutas.
     */
    public function index()
    {
        $rutas = Ruta::orderBy('id', 'desc')->get();
        return view('admin.Operativo.Rutas.index', compact('rutas'));
    }

    /**
     * Mostrar el formulario de creación.
     */
    public function create()
    {
        return view('admin.Operativo.Rutas.create');
    }

    /**
     * Guardar una nueva ruta.
     */
  public function store(Request $request)
{
    $request->validate([
        'origen' => 'required|string|max:255',
        'destino' => 'required|string|max:255',
    ]);

    Ruta::create([
        'origen' => $request->origen,
        'destino' => $request->destino,
        'user_id' => Auth::id(), 
    ]);

    return redirect()->route('admin.operativo.rutas.index')->with('success', 'Ruta creada correctamente.');
}


    /**
     * Mostrar formulario para editar una ruta existente.
     */
    public function edit($id)
    {
        $ruta = Ruta::findOrFail($id);
        return view('admin.Operativo.Rutas.edit', compact('ruta'));
    }

    /**
     * Actualizar los datos de una ruta.
     */
    public function update(Request $request, $id)
    {
        $ruta = Ruta::findOrFail($id);

        $validated = $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
        ]);

        $ruta->update($validated);

        return redirect()->route('admin.operativo.rutas.index')
                         ->with('success', 'Ruta actualizada correctamente.');
    }

    /**
     * Borrado lógico (soft delete).
     */
    public function destroy($id)
    {
        $ruta = Ruta::findOrFail($id);
        $ruta->delete();

        return redirect()->route('admin.operativo.rutas.index')
                         ->with('success', 'Ruta eliminada correctamente.');
    }

    /**
     * Restaurar una ruta eliminada (opcional).
     */
    public function restore($id)
    {
        $ruta = Ruta::onlyTrashed()->findOrFail($id);
        $ruta->restore();

        return redirect()->route('admin.operativo.rutas.index')
                         ->with('success', 'Ruta restaurada correctamente.');
    }
}
