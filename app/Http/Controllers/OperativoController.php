<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperativoController extends Controller
{
    public function index()
    {
        return view('admin.operativo.index');
    }

    public function create()
    {
        return view('admin.operativo.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
        ]);


        // Redirigir correctamente con el nombre de ruta completo
        return redirect()->route('admin.operativo.index')
                         ->with('success', 'Registro operativo guardado correctamente.');
    }
}
