<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Puestos;
use App\Models\RH\Departamentos;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.puestos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamentos::all();
        return view('admin.puestos.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:puestos,name',
            'departamento_id' => 'required|exists:departamentos,id',
            'num_plazas' => 'required|integer|min:1',
            'descripcion_puesto' => 'nullable|string',
            'salario_puesto' => 'nullable|numeric',
        ]);

        Puestos::create($data);

        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El puesto se creo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.puestos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puestos $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puestos $puesto)
    {
        $departamentos = Departamentos::all();
        return view('admin.puestos.edit', compact('puesto', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puestos $puesto)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:puestos,name,' . $puesto->id,
            'descripcion_puesto' => 'nullable|string',
            'num_plazas' => 'required|integer|min:1',
            'salario_puesto' => 'nullable|numeric',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $puesto->update($data);

        session()->flash('update',
            [
                'icon' => 'info',

                'text' => 'El puesto se actualizo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.puestos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puestos $puesto)
    {
        $puesto->delete();

        session()->flash('delete',
            [
                'icon' => 'error',

                'text' => 'El puesto se elimino correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.puestos.index');
    }
}
