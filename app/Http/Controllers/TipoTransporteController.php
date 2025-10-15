<?php

namespace App\Http\Controllers;

use App\Models\TipoTransporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoTransporteController extends Controller
{
    /**
     * Lista todos los tipos de transporte activos
     */
    public function index()
    {
        $tipos = TipoTransporte::all(); // Solo registros activos
        return view('admin.operativo.tipotransporte.index', compact('tipos'));
    }

    /**
     * Muestra el formulario de creación
     */
    public function create()
    {
        return view('admin.operativo.tipotransporte.create');
    }

    /**
     * Guarda un nuevo tipo de transporte
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_transporte' => 'required|string|max:255|unique:tipos_transporte,nombre_transporte',
            'descripcion_transporte' => 'nullable|string',
        ]);

        TipoTransporte::create([
            'nombre_transporte' => $request->nombre_transporte,
            'descripcion_transporte' => $request->descripcion_transporte,
            'usuario_creo' => Auth::id(),
        ]);

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte creado correctamente.');
    }

    /**
     * Muestra el formulario de edición
     */
    public function edit(TipoTransporte $tipotransporte)
    {
        return view('admin.operativo.tipotransporte.edit', compact('tipotransporte'));
    }

    /**
     * Actualiza un tipo de transporte existente
     */
    public function update(Request $request, TipoTransporte $tipotransporte)
    {
        $request->validate([
            'nombre_transporte' => 'required|string|max:255|unique:tipos_transporte,nombre_transporte,' . $tipotransporte->id,
            'descripcion_transporte' => 'nullable|string',
        ]);

        $tipotransporte->update([
            'nombre_transporte' => $request->nombre_transporte,
            'descripcion_transporte' => $request->descripcion_transporte,
            'usuario_actualizo' => Auth::id(),
        ]);

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte actualizado correctamente.');
    }

    /**
     * Elimina un tipo de transporte (SoftDelete)
     */
    public function destroy(TipoTransporte $tipotransporte)
    {
        $tipotransporte->delete();

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte eliminado correctamente.');
    }

    /**
     * Restaura un tipo de transporte eliminado
     */
    public function restore($id)
    {
        $tipotransporte = TipoTransporte::onlyTrashed()->findOrFail($id);
        $tipotransporte->restore();

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte restaurado correctamente.');
    }
}
