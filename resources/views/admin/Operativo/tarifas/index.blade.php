<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Operativo', 'href' => route('admin.operativo.tarifas.index')],
    ['name' => 'Tarifas']
]">
    <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-black">Tarifas de ruta</h1>
            <a href="{{ route('admin.operativo.tarifas.create') }}"
               class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 flex items-center">
               <i class="fa-solid fa-plus mr-2"></i> Nueva tarifa
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

    <table class="min-w-full border border-gray-200 rounded text-center">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border text-center">Ruta</th>
            <th class="px-4 py-2 border text-center">Transporte</th>
            <th class="px-4 py-2 border text-center">Monto</th>
            <th class="px-4 py-2 border text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tarifas as $tarifa)
            <tr>
                <td class="px-4 py-2 border text-center">{{ $tarifa->ruta->origen ?? '-' }} → {{ $tarifa->ruta->destino ?? '-' }}</td>
                <td class="px-4 py-2 border text-center">{{ $tarifa->tipoTransporte->nombre_transporte ?? '-' }}</td>
                <td class="px-4 py-2 border text-center">{{ number_format($tarifa->monto, 2) }}</td>
                <td class="px-4 py-2 border text-center flex justify-center space-x-2">
                    <a href="{{ route('admin.operativo.tarifas.edit', $tarifa->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>

                    <form action="{{ route('admin.operativo.tarifas.destroy', $tarifa->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este registro?');">
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
