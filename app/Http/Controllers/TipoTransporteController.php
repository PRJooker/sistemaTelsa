<?php

namespace App\Http\Controllers;

use App\Models\TipoTransporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoTransporteController extends Controller
{
    public function index()
    {
        $tipos = TipoTransporte::all();
        return view('admin.operativo.tipotransporte.index', compact('tipos'));
    }

    public function create()
    {
        return view('admin.operativo.tipotransporte.create');
    }

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

    public function edit(TipoTransporte $tipoTransporte)
    {
        return view('admin.operativo.tipotransporte.edit', compact('tipoTransporte'));
    }

    public function update(Request $request, TipoTransporte $tipoTransporte)
    {
        $request->validate([
            'nombre_transporte' => 'required|string|max:255|unique:tipos_transporte,nombre_transporte,' . $tipoTransporte->id,
            'descripcion_transporte' => 'nullable|string',
        ]);

        $tipoTransporte->update([
            'nombre_transporte' => $request->nombre_transporte,
            'descripcion_transporte' => $request->descripcion_transporte,
            'usuario_actualizo' => Auth::id(),
        ]);

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte actualizado correctamente.');
    }

    public function destroy(TipoTransporte $tipoTransporte)
    {
        $tipoTransporte->delete();

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte eliminado correctamente.');
    }

    public function restore($id)
    {
        $tipo = TipoTransporte::onlyTrashed()->findOrFail($id);
        $tipo->restore();

        return redirect()->route('admin.operativo.tipotransporte.index')
            ->with('success', 'Tipo de transporte restaurado correctamente.');
    }
}
