<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Operativo', 'href' => route('admin.operativo.tipotransporte.index')],
    ['name' => 'Tipos de Transporte'],
    ['name' => 'Nuevo']
]">
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4 text-black">Nuevo Tipo de Transporte</h1>

        <form action="{{ route('admin.operativo.tipotransporte.store') }}" method="POST" class="grid gap-4">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre_transporte" class="block font-medium text-gray-700">Tipo Transporte</label>
                <input type="text" name="nombre_transporte" id="nombre_transporte"
                       value="{{ old('nombre_transporte') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Descripción -->
            <div>
                <label for="descripcion_transporte" class="block font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion_transporte" id="descripcion_transporte"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion_transporte') }}</textarea>
            </div>

            <!-- Botones -->
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center">
                    <i class="fa-solid fa-save mr-2"></i> Guardar
                </button>

                <a href="{{ route('admin.operativo.tipotransporte.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 flex items-center">
                   <i class="fa-solid fa-arrow-left mr-2"></i> Cancelar y regresar
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
