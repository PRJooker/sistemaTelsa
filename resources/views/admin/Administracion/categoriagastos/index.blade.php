<x-admin-layout :breadcrumbs="[['name' => 'Dashboard', 'href' => route('dashboard')], ['name' => 'Administrativo'], ['name' => 'Categorías de Gasto']]">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categorías de Gasto</h1>
        <a href="{{ route('admin.administrativo.categoriasgastos.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Nueva Categoría
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-4">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                        <td class="px-4 py-2">{{ $categoria->descripcion }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.administrativo.categoriasgastos.edit', $categoria->id) }}" class="text-blue-600 hover:underline mr-3">Editar</a>
                            <form action="{{ route('admin.administrativo.categoriasgastos.destroy', $categoria->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
