<x-admin-layout
title="Nuevo Empleado"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
     [
        'name' => 'Empleados',
        'href' => route('admin.empleados.index'),
    ],
    [
        'name' => 'Crear Empleado',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.empleados.store') }}" class="space-y-4">
    @csrf
   <div class="grid gap-6 mb-6 md:grid-cols-2">
             <div >
                <x-wire-input label="Nombre del Empleado" name="name" placeholder="Nombre del Empleado" autofocus value="{{old('name')}}" />
            </div>
            <div >
                <x-wire-select
                    label="Puesto Asociado"
                    placeholder="Seleccione un puesto"
                    :options="$puestos"
                    option-label="name"
                    value="{{old('puesto_id')}}"
                    option-value="id"
                    name="puesto_id"
                >
                </x-wire-select>
            </div>
   </div>
   <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <x-wire-input label="Apellido Paterno" name="apellido_ap" placeholder="Apellido Paterno" autofocus value="{{old('apellido_ap')}}" />
            </div>
            <div >
                <x-wire-input label="Apellido Materno" name="apellido_ma" placeholder="Apellido Materno" autofocus value="{{old('apellido_ma')}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div >
                <x-wire-input label="CURP" name="curp" placeholder="CURP" autofocus value="{{old('curp')}}" />
            </div>
            <div >
                <x-wire-input label="RFC" name="rfc" placeholder="RFC" autofocus value="{{old('rfc')}}" />
            </div>
            <div >
                <x-wire-input label="Seguro Social" name="seguro_social" placeholder="Seguro Social" autofocus value="{{old('seguro_social')}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div >
                <x-wire-input label="Dirección" name="direccion" placeholder="Dirección" autofocus value="{{old('direccion')}}" />
            </div>
            <div >
                <x-wire-input label="Municipio" name="municipio" placeholder="Municipio" autofocus value="{{old('municipio')}}" />
            </div>
            <div >
                <x-wire-input label="Estado" name="estado" placeholder="Estado" autofocus value="{{old('estado')}}" />
            </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <x-wire-phone  label="Teléfono" name="telefono" placeholder="Teléfono" autofocus value="{{old('telefono')}}" />
            </div>
    </div>
    <div class="flex justify-end">
       <x-wire-button type="submit" lg primary  hover="primary" focus:outline.primary>
        DAR DE ALTA EMPLEADO
       </x-wire-button>
    </div>

</form>
</x-wire-card>

</x-admin-layout>
