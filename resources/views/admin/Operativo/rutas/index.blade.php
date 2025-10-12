<x-admin-layout>
    <div class="container mx-auto mt-6 px-4">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Listado de Rutas</h2>

        <!-- Botón Añadir nueva ruta -->
        <div class="mb-4">
            <a href="{{ route('admin.operativo.rutas.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-900 hover:bg-gray-700 text-white font-medium rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 transition">
                <i class="fa-solid fa-plus mr-2"></i> Añadir nueva ruta
            </a>
        </div>

        <!-- Tabla de rutas -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Origen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Destino</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha de creación</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($rutas as $ruta)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition {{ $ruta->trashed() ? 'bg-red-50 dark:bg-red-900' : '' }}">
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ruta->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ruta->origen }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ruta->destino }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $ruta->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">
                                @if (!$ruta->trashed())
                                    <!-- Botón Editar -->
                                    <a href="{{ route('admin.operativo.rutas.edit', $ruta->id) }}" 
                                       class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded flex items-center">
                                        <i class="fa-solid fa-pen-to-square mr-1"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('admin.operativo.rutas.destroy', $ruta->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta ruta?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded flex items-center">
                                            <i class="fa-solid fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                @else
                                    <!-- Botón Restaurar -->
                                    <form action="{{ route('admin.operativo.rutas.restore', $ruta->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-2 py-1 bg-green-600 hover:bg-green-700 text-white rounded flex items-center">
                                            <i class="fa-solid fa-rotate-left mr-1"></i> Restaurar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
