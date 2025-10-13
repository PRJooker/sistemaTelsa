<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Operativo', 'href' => route('admin.operativo.tipotransporte.index')],
    ['name' => 'Tipos de Transporte']
]">
    <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold text-black">Tipos de Transporte</h1>
    <a href="{{ route('admin.operativo.tipotransporte.create') }}"
       class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 flex items-center">
       <i class="fa-solid fa-plus mr-2"></i> Nuevo transporte
    </a>
</div>

        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-center">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Tipo Transporte</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tipos as $tipo)
                    <tr class="text-center">
                        <td class="px-4 py-2 border align-middle">{{ $tipo->id }}</td>
                        <td class="px-4 py-2 border align-middle">{{ $tipo->nombre_transporte }}</td>
                        <td class="px-4 py-2 border align-middle">{{ $tipo->descripcion_transporte }}</td>
                        <td class="px-4 py-2 border align-middle flex justify-center space-x-2">
                            <!-- Editar -->
                            <a href="{{ route('admin.operativo.tipotransporte.edit', $tipo->id) }}"
                               class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                               Editar
                            </a>

                            <!-- Eliminar -->
                            <form action="{{ route('admin.operativo.tipotransporte.destroy', $tipo->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este registro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 border text-center text-gray-500">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
