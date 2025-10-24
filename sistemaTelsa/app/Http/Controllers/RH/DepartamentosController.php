<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Departamentos;
use Illuminate\Http\Request;
use App\Models\RH\Areas;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.departamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Areas::all();
        return view('admin.departamentos.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
        ]);

        Departamentos::create($data);

        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El departamento se creo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.departamentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamentos $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamentos $departamento)
    {
        $areas = Areas::all();
        return view('admin.departamentos.edit', compact('departamento', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamentos $departamento)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
        ]);

        $departamento->update($data);

        session()->flash('update',
            [
                'icon' => 'info',

                'text' => 'El departamento se actualizo correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]);

        return redirect()->route('admin.departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamentos $departamento)
    {
        $departamento->delete();

        session()->flash('delete',
            [
                'icon' => 'error',

                'text' => 'El departamento se ha eliminado correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]
        );

        return redirect()->route('admin.departamentos.index');
    }
}
