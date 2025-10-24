<x-admin-layout
title="Departamentos"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Departamentos',
    ]
]">

@push('css')
    <style>
        table th span, table td {
            font-size: 0.75rem !important;
            white-space: normal !important;
        }
    </style>
@endpush

<x-slot name="action">

    <x-wire-button href="{{route('admin.departamentos.create')}}" label="Crear Departamento" right-icon="plus" blue focus:light.blue>

    </x-wire-button>

</x-slot>
@livewire('admin.datatable.departamento-table')
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
