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
        'name' => 'Crear Area',
    ]
]">

<x-wire-card>
<form method="POST" action="{{ route('admin.areas.store') }}" class="space-y-4">
    @csrf
    <div class="mb-4">
        <x-wire-input label="Nombre del Area" name="name" placeholder="Nombre del Area" autofocus value="{{old('name')}}" />
    </div>
    <div class="flex justify-end">
       <x-wire-button type="submit" lg primary  hover="primary" focus:outline.primary>
        CREAR ÁREA
       </x-wire-button>
    </div>

</form>
</x-wire-card>

</x-admin-layout>
