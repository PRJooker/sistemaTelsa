<?php

namespace App\Http\Controllers\Operativo;
use App\Http\Controllers\Controller;
use App\Models\Tarifa;
use App\Models\Ruta;
use App\Models\TipoTransporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarifaController extends Controller
{
    /**
     * Mostrar listado de tarifas
     */
    public function index()
    {
        $tarifas = Tarifa::with(['ruta', 'tipoTransporte'])->get();
        return view('admin.operativo.tarifas.index', compact('tarifas'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $rutas = Ruta::all();
        $tipos = TipoTransporte::all();

        return view('admin.operativo.tarifas.create', compact('rutas', 'tipos'));
    }

    /**
     * Guardar nueva tarifa
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruta_id' => 'required|exists:rutas,id',
            'tipo_transporte_id' => 'required|exists:tipos_transporte,id',
            'monto' => 'required|numeric|min:0',
        ]);

        Tarifa::create([
            'ruta_id' => $request->ruta_id,
            'tipo_transporte_id' => $request->tipo_transporte_id,
            'monto' => $request->monto,
            'usuario_actualizo' => Auth::id(), // Guardamos el usuario logueado
        ]);

        return redirect()->route('admin.operativo.tarifas.index')
                         ->with('success', 'Tarifa creada correctamente.');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Tarifa $tarifa)
    {
        $rutas = Ruta::all();
        $tiposTransporte = TipoTransporte::all();

        return view('admin.operativo.tarifas.edit', compact('tarifa', 'rutas', 'tiposTransporte'));
    }

    /**
     * Actualizar tarifa
     */
    public function update(Request $request, Tarifa $tarifa)
    {
        $request->validate([
            'ruta_id' => 'required|exists:rutas,id',
            'tipo_transporte_id' => 'required|exists:tipos_transporte,id',
            'monto' => 'required|numeric',
        ]);

        $tarifa->update([
            'ruta_id' => $request->ruta_id,
            'tipo_transporte_id' => $request->tipo_transporte_id,
            'monto' => $request->monto,
            'usuario_actualizo' => Auth::id(), // Guardamos el usuario logueado
        ]);

        return redirect()->route('admin.operativo.tarifas.index')
                        ->with('success', 'Tarifa actualizada correctamente.');
    }

    /**
     * Eliminar tarifa
     */
    public function destroy(Tarifa $tarifa)
    {
        $tarifa->delete();

        return redirect()->route('admin.operativo.tarifas.index')
                         ->with('success', 'Tarifa eliminada correctamente.');
    }
}
