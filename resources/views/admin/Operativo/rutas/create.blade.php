<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Operativo', 'href' => route('admin.operativo.rutas.index')],
    ['name' => 'Registrar Ruta']
]">
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4">Registrar Ruta</h1>

        <form action="{{ route('admin.operativo.rutas.store') }}" method="POST" class="grid gap-4 md:grid-cols-2">
            @csrf
            <div>
                <label for="origen" class="block font-medium text-gray-700">Origen</label>
                <input type="text" name="origen" id="origen" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="destino" class="block font-medium text-gray-700">Destino</label>
                <input type="text" name="destino" id="destino" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="md:col-span-2 flex space-x-2 mt-4">
            
                <!-- Botón Registrar -->
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i> Registrar
                </button>
                  <!-- Botón Cancelar -->
                <a href="{{ route('admin.operativo.rutas.index') }}" 
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 flex items-center">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Cancelar y volver
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
