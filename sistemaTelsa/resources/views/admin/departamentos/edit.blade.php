<x-admin-layout
title="Departamentos"
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
        'name' => 'Editar Departamento',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.departamentos.update', $departamento) }}" class="space-y-4">
    @csrf
    @method('PUT')
   <div class="grid gap-6 mb-6 md:grid-cols-2">

             <div>
                <x-wire-input label="Nombre del Departamento" name="name" placeholder="Nombre del Departamento" autofocus value="{{old('name', $departamento->name)}}" />
            </div>
            <div>
                 {{-- <x-wire-select
                    label="Área Asociada"
                    placeholder="Seleccione una área"
                    :options="$areas"
                    option-label="name"
                    option-value="id"
                    name="area_id"
                    :selected="old('area_id', $departamento->area_id)"
                    searchable
                /> --}}

                <x-wire-native-select label="Área Asociada" name="area_id" placeholder="Seleccione un área">
                    @foreach ($areas as $area )
                        <option value="{{ $area->id }}" @selected(old('area_id', $departamento->area_id) == $area->id)>{{ $area->name }}</option>
                    @endforeach
                </x-wire-native-select>
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
