<x-admin-layout
title="Puestos"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
     [
        'name' => 'Puestos',
        'href' => route('admin.puestos.index'),
    ],
    [
        'name' => 'Editar Puesto',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.empleados.update', $empleado) }}" class="space-y-4">
    @csrf
    @method('PUT')
  <div class="grid gap-6 mb-6 md:grid-cols-2">
             <div >
                <x-wire-input label="Nombre del Empleado" name="name" placeholder="Nombre del Empleado" autofocus value="{{old('name', $empleado->name)}}" />
            </div>
            <div >

                <x-wire-native-select label="Puesto Asociado" name="puesto_id" placeholder="Seleccione un área">
                    @foreach ($puestos as $puesto )
                        <option value="{{ $puesto->id }}" @selected(old('puesto_id', $empleado->puesto_id) == $puesto->id)>{{ $puesto->name }}</option>
                    @endforeach
                </x-wire-native-select>
            </div>
   </div>
   <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <x-wire-input label="Apellido Paterno" name="apellido_ap" placeholder="Apellido Paterno" autofocus value="{{old('apellido_ap', $empleado->apellido_ap)}}" />
            </div>
            <div >
                <x-wire-input label="Apellido Materno" name="apellido_ma" placeholder="Apellido Materno" autofocus value="{{old('apellido_ma', $empleado->apellido_ma)}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div >
                <x-wire-input label="CURP" name="curp" placeholder="CURP" autofocus value="{{old('curp', $empleado->curp)}}" />
            </div>
            <div >
                <x-wire-input label="RFC" name="rfc" placeholder="RFC" autofocus value="{{old('rfc', $empleado->rfc)}}" />
            </div>
            <div >
                <x-wire-input label="Seguro Social" name="seguro_social" placeholder="Seguro Social" autofocus value="{{old('seguro_social', $empleado->seguro_social)}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div >
                <x-wire-input label="Dirección" name="direccion" placeholder="Dirección" autofocus value="{{old('direccion', $empleado->direccion)}}" />
            </div>
            <div >
                <x-wire-input label="Municipio" name="municipio" placeholder="Municipio" autofocus value="{{old('municipio', $empleado->municipio)}}" />
            </div>
            <div >
                <x-wire-input label="Estado" name="estado" placeholder="Estado" autofocus value="{{old('estado', $empleado->estado)}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <x-wire-phone  label="Teléfono" name="telefono" placeholder="Teléfono" autofocus value="{{old('telefono', $empleado->telefono)}}" />
            </div>
    </div>
    <div class="flex justify-end">
       <x-wire-button type="submit" lg green  hover="green" focus:outline.green>
        ACTUALIZAR DEPARTAMENTO
       </x-wire-butt>
    </div>

</form>
</x-wire-card>

</x-admin-layout>
