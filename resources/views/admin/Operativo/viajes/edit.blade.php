<x-admin-layout
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('dashboard')],
        ['name' => 'Operativo', 'href' => route('admin.operativo.viajes.index')],
        ['name' => 'Editar Viaje']
    ]"
>
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4">Editar Viaje</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.operativo.viajes.update', $viaje->IdViaje) }}" method="POST" class="mb-4 grid gap-4 md:grid-cols-2">
            @csrf
            @method('PUT')

            <div>
                <label for="origen" class="block font-medium text-gray-700">Origen</label>
                <input type="text" name="origen" id="origen" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $viaje->Origen }}" required>
            </div>

            <div>
                <label for="destino" class="block font-medium text-gray-700">Destino</label>
                <input type="text" name="destino" id="destino" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $viaje->Destino }}" required>
            </div>

            <div class="md:col-span-2">
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="FlagActivo" value="1" {{ $viaje->FlagActivo ? 'checked' : '' }} class="form-checkbox">
                    <span class="ml-2 text-gray-700">Activo</span>
                </label>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 inline-flex items-center">
                    <i class="bi bi-save-fill mr-2"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
