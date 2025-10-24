<x-admin-layout
title="Areas"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Areas',
    ]
]">


<x-slot name="action">

    <x-wire-button href="{{route('admin.areas.create')}}" label="Crear Area" right-icon="plus" blue focus:light.blue>

    </x-wire-button>

</x-slot>
@livewire('admin.datatable.area-table')
@push('js')
    <script>
        forms = document.querySelectorAll('.form-delete');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡elimínalo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        });
    </script>
@endpush

</x-admin-layout>
