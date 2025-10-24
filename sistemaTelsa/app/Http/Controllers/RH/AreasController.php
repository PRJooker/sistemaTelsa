<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:areas,name',
        ]);

        $area = Areas::create($data);

        session()->flash('success',
            [
                'icon' => 'success',

                'text' => 'El área se ha creado correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]
        );
        //return $request->all();
        return redirect()->route('admin.areas.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Areas $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Areas $area)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:areas,name,' . $area->id,
        ]);

        $area->update($data);

        session()->flash('update',
            [
                'icon' => 'info',

                'text' => 'El área se ha actualizado correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]
        );

        return redirect()->route('admin.areas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Areas $area)
    {
        if ($area->departamentos()->exists()) {
            session()->flash('error',
                [
                    'icon' => 'error',

                    'text' => 'No se puede eliminar el área porque tiene departamentos asociados.',
                    'showConfirmButton' => false,
                    'timer' => 1500,
                ]
            );

            return redirect()->route('admin.areas.index');
        }

        $area->delete();

        session()->flash('delete',
            [
                'icon' => 'error',

                'text' => 'El área se ha eliminado correctamente.',
                'showConfirmButton' => false,
                'timer' => 1500,
            ]
        );

        return redirect()->route('admin.areas.index');
    }
}
