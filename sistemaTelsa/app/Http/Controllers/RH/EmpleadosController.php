<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Empleados;
use App\Models\RH\Puestos;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = Puestos::all();
        return view('admin.empleados.create', compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'apellido_ap' => 'required|string|max:255',
            'apellido_ma' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:empleados,curp',
            'rfc' => 'required|string|max:13|unique:empleados,rfc',
            'seguro_social' => 'required|string|max:11|unique:empleados,seguro_social',
            'direccion' => 'required|string|max:500',
            'municipio' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'puesto_id' => 'required|exists:puestos,id',
        ]);
        Empleados::create($data);
        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El empleado se creo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);
        return redirect()->route('admin.empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleado)
    {
        $puestos = Puestos::all();
        return view('admin.empleados.edit', compact('empleado', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleado)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'apellido_ap' => 'required|string|max:255',
            'apellido_ma' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:empleados,curp,' . $empleado->id,
            'rfc' => 'required|string|max:13|unique:empleados,rfc,' . $empleado->id,
            'seguro_social' => 'required|string|max:11|unique:empleados,seguro_social,' . $empleado->id,
            'direccion' => 'required|string|max:500',
            'municipio' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'puesto_id' => 'required|exists:puestos,id',
        ]);
        $empleado->update($data);
        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El empleado se actualizo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);
        return redirect()->route('admin.empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleado)
    {
        $empleado->delete();

        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El empleado se elimino correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.empleados.index');
    }
}
