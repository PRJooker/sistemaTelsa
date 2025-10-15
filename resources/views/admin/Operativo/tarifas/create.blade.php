<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Operativo', 'href' => route('admin.operativo.tarifas.index')],
    ['name' => 'Nueva Tarifa']
]">
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4 text-black">Nueva Tarifa</h2>

        <form method="POST" action="{{ route('admin.operativo.tarifas.store') }}" class="grid gap-4">
            @csrf

            <!-- Ruta -->
            <div>
                <label for="ruta_id" class="block mb-1 font-medium text-gray-700">Ruta</label>
                <select name="ruta_id" id="ruta_id" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccione una ruta</option>
                    @foreach($rutas as $ruta)
                        <option value="{{ $ruta->id }}">
                            {{ $ruta->origen }} → {{ $ruta->destino }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tipo de Transporte -->
            <div>
                <label for="tipo_transporte_id" class="block mb-1 font-medium text-gray-700">Tipo de Transporte</label>
                <select name="tipo_transporte_id" id="tipo_transporte_id" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccione un tipo de transporte</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre_transporte }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Monto -->
            <div>
                <label for="monto" class="block mb-1 font-medium text-gray-700">Monto</label>
                <input type="number" step="0.01" name="monto" id="monto"
                       class="block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Botones -->
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 flex items-center">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Guardar
                </button>

                <a href="{{ route('admin.operativo.tarifas.index') }}"
                   class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 flex items-center">
                   <i class="fa-solid fa-arrow-left me-2"></i> Cancelar y regresar
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
