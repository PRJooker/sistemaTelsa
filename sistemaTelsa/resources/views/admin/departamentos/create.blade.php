<x-admin-layout
title="Nuevo Departamento"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
     [
        'name' => 'Departamentos',
        'href' => route('admin.departamentos.index'),
    ],
    [
        'name' => 'Crear Departamento',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.departamentos.store') }}" class="space-y-4">
    @csrf
   <div class="grid gap-6 mb-6 md:grid-cols-2">

             <div>
                <x-wire-input label="Nombre del Departamento" name="name" placeholder="Nombre del Departamento" autofocus value="{{old('name')}}" />
            </div>
            <div>
                 <x-wire-select
                    label="Área Asociada"
                    placeholder="Seleccione una área"
                    :options="$areas"
                    option-label="name"
                    option-value="id"
                    name="area_id"
                >

                </x-wire-select>
                {{-- <x-wire-native-select label="Área Asociada" name="area_id" placeholder="Seleccione un área">
                    @foreach ($areas as $area )
                        <option value="{{ $area->id }}" @selected(old('area_id') == $area->id)>{{ $area->name }}</option>
                    @endforeach
                </x-wire-native-select> --}}
            </div>
   </div>
    <div class="flex justify-end">
       <x-wire-button type="submit" lg primary  hover="primary" focus:outline.primary>
        CREAR DEPARTAMENTO
       </x-wire-button>
    </div>

</form>
</x-wire-card>

</x-admin-layout>
