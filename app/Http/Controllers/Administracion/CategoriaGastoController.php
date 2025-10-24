<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\CategoriaGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaGastoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaGasto::orderBy('nombre')->paginate(10);
        return view('admin.administracion.categoriagastos.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.administracion.categoriagastos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categoria_gastos,nombre',
            'descripcion' => 'nullable|string|max:255',
        ]);

        CategoriaGasto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.administrativo.categoriasgastos.index')
            ->with('success', 'Categoría de gasto creada correctamente.');
    }

    public function edit(CategoriaGasto $categoriaGasto)
    {
        return view('admin.administracion.categoriagastos.edit', compact('categoriaGasto'));
    }

    public function update(Request $request, CategoriaGasto $categoriaGasto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categoria_gastos,nombre,' . $categoriaGasto->id,
            'descripcion' => 'nullable|string|max:255',
        ]);

        $categoriaGasto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.administrativo.categoriasgastos.index')
            ->with('success', 'Categoría de gasto actualizada correctamente.');
    }

    public function destroy(CategoriaGasto $categoriaGasto)
    {
        $categoriaGasto->delete();

        return redirect()->route('admin.administrativo.categoriasgastos.index')
            ->with('success', 'Categoría de gasto eliminada correctamente.');
    }
}
