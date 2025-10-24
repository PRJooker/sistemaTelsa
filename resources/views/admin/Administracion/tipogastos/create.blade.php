<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('dashboard')],
    ['name' => 'Administrativo', 'href' => route('admin.administrativo.tiposgastos.index')],
    ['name' => 'Nuevo Tipo de Gasto']
]">
    <div class="p-6 bg-white w-full">
        <h2 class="text-xl font-bold mb-4 text-black">Nuevo Tipo de Gasto</h2>

        <form method="POST" action="{{ route('admin.administrativo.tiposgastos.store') }}" class="grid gap-4 w-full">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block mb-1 font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Categoría -->
            <div>
                <label for="categoria_gasto_id" class="block mb-1 font-medium text-gray-700">Categoría de Gasto</label>
                <select name="categoria_gasto_id" id="categoria_gasto_id" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block mb-1 font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion"
                          class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Botones -->
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 flex items-center">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                </button>

                <a href="{{ route('admin.administrativo.tiposgastos.index') }}"
                   class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 flex items-center">
                   <i class="fa-solid fa-arrow-left me-2"></i> Cancelar y regresar
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
