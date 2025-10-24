<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoGasto;
use App\Models\CategoriaGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoGastoController extends Controller
{
    public function index()
    {
        $tipos = TipoGasto::with('categoriaGasto')->orderBy('nombre')->paginate(10);
        return view('admin.administracion.tipogastos.index', compact('tipos'));
    }

    public function create()
    {
        $categorias = CategoriaGasto::orderBy('nombre')->get();
        return view('admin.administracion.tipogastos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_gasto_id' => 'required|exists:categoria_gastos,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        TipoGasto::create([
            'categoria_gasto_id' => $request->categoria_gasto_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.administrativo.tiposgastos.index')
            ->with('success', 'Tipo de gasto creado correctamente.');
    }

    public function edit(TipoGasto $tipoGasto)
    {
        $categorias = CategoriaGasto::orderBy('nombre')->get();
        return view('admin.administracion.tipogastos.edit', compact('tipoGasto', 'categorias'));
    }

    public function update(Request $request, TipoGasto $tipoGasto)
    {
        $request->validate([
            'categoria_gasto_id' => 'required|exists:categoria_gastos,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $tipoGasto->update([
            'categoria_gasto_id' => $request->categoria_gasto_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.administrativo.tiposgastos.index')
            ->with('success', 'Tipo de gasto actualizado correctamente.');
    }

    public function destroy(TipoGasto $tipoGasto)
    {
        $tipoGasto->delete();

        return redirect()->route('admin.administrativo.tiposgastos.index')
            ->with('success', 'Tipo de gasto eliminado correctamente.');
    }
}
