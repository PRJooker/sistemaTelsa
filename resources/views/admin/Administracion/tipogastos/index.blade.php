<x-admin-layout :breadcrumbs="[['name' => 'Dashboard', 'href' => route('dashboard')], ['name' => 'Administrativo'], ['name' => 'Tipos de Gasto']]">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tipos de Gasto</h1>
        <a href="{{ route('admin.administrativo.tiposgastos.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Nuevo Tipo
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-4">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Categoría</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $tipo->categoriaGasto->nombre }}</td>
                        <td class="px-4 py-2">{{ $tipo->nombre }}</td>
                        <td class="px-4 py-2">{{ $tipo->descripcion }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.administrativo.tiposgastos.edit', $tipo->id) }}" class="text-blue-600 hover:underline mr-3">Editar</a>
                            <form action="{{ route('admin.administrativo.tiposgastos.destroy', $tipo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Seguro que deseas eliminar este tipo de gasto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
