<x-admin-layout
title="Areas"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
     [
        'name' => 'Areas',
        'href' => route('admin.areas.index'),
    ],
    [
        'name' => 'Editar Area',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.areas.update', $area) }}" class="space-y-4">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <x-wire-input label="Nombre del Area" name="name" placeholder="Nombre del Area" autofocus value="{{old('name', $area->name)}}" />
    </div>
    <div class="flex justify-end">
       <x-wire-button type="submit" lg green  hover="green" focus:outline.green>
        ACTUALIZAR ÁREA
       </x-wire-butt>
    </div>

</form>
</x-wire-card>

</x-admin-layout>
