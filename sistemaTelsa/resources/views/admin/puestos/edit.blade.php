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
        'name' => 'Editar Departamento',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.puestos.update', $puesto) }}" class="space-y-4">
    @csrf
    @method('PUT')
  <div class="grid gap-6 mb-6 md:grid-cols-2">
             <div >
                <x-wire-input label="Nombre del Puesto" name="name" placeholder="Nombre del Puesto" autofocus value="{{old('name', $puesto->name)}}" />
            </div>
            <div >
                <x-wire-native-select label="Departamento Asociado" name="departamento_id" placeholder="Seleccione un departamento">
                    @foreach ($departamentos as $departamento )
                        <option value="{{ $departamento->id }}" @selected(old('departamento_id', $puesto->departamento_id) == $departamento->id)>{{ $departamento->name }}</option>
                    @endforeach
                </x-wire-native-select>
            </div>
   </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
           <div>
                <x-wire-number label="Número de Plazas" name="num_plazas" placeholder="Número de Plazas"  value="{{old('num_plazas', $puesto->num_plazas)}}">
                    {{old('num_plazas', $puesto->num_plazas)}}
                </x-wire-number>
           </div>
            <div >
                <x-wire-currency icon="currency-dollar"
                    thousands=","
                    decimal="."
                    precision="4"
                    label="Salario del Puesto"
                    name="salario_puesto"
                    placeholder="Salario del Puesto"
                    value="{{old('salario_puesto', $puesto->salario_puesto)}}" />
            </div>
             <div >
                <x-wire-textarea label="Descripción del Puesto" name="descripcion_puesto" placeholder="Descripción del Puesto"  value="{{old('descripcion_puesto', $puesto->descripcion_puesto)}}">
                    {{old('descripcion_puesto', $puesto->descripcion_puesto)}}
                </x-wire-textarea>
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
